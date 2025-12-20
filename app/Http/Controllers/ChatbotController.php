<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\SanPham;

class ChatbotController extends Controller
{
    public function search(Request $request)
    {
        //  LẤY QUERY
        $query = trim($request->input('query', ''));

        if ($query === '') {
            return response()->json([
                'reply' => 'Bạn vui lòng nhập nội dung cần tìm.'
            ]);
        }

        //  MẶC ĐỊNH KEYWORD = QUERY GỐC
        $keywords = $query;

        //  GỌI GEMINI (CÁCH 1 – BỎ VERIFY SSL)
        if (!empty(env('GEMINI_API_KEY'))) {
            try {
                $response = Http::withOptions([
                        'verify' => false, // ⚠️ CHỈ DÙNG LOCAL
                    ])
                    ->timeout(10)
                    ->withHeaders([
                        'Content-Type' => 'application/json',
                        'x-goog-api-key' => env('GEMINI_API_KEY'),
                    ])
                    ->post(
                       "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent",
                        [
                            'contents' => [
                                [
                                    'parts' => [
                                        [
                                            'text' =>
                                                "Người dùng muốn tìm sách với nội dung sau: \"$query\".
                                                 Hãy trích ra các từ khóa quan trọng, bỏ các từ chung chung như: tôi, muốn, sách, có, là, về.
                                                 Chỉ trả về danh sách từ khóa ngắn gọn không chưa bất kì kí tự thừa nào khác."
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    );
                
                    // Log::info('Gemini RAW response', [
                    //     'status' => $response->status(),
                    //     'body'   => $response->body(),
                    // ]);
                $text = data_get(
                    $response->json(),
                    'candidates.0.content.parts.0.text'
                );

                if (is_string($text) && trim($text) !== '') {
                    $keywords = $text;
                }

            } catch (\Throwable $e) {
                Log::warning('Gemini error: ' . $e->getMessage());
            }
        }

        //  STOP WORDS TIẾNG VIỆT
        $stopWords = [
            'sách','tôi','muốn','tìm','về','cho','có','là','nội','dung',
            'những','các','một','cuốn','và','với','được','trong','để',
            'của','trên','bạn','này','đó','ra','khi','thì','như','đã',
            'tại','nên','rằng','vậy','đang','cũng'
        ];

        //TÁCH TỪ + LỌC STOP WORD
        $tokens = preg_split('/[\s,]+/', trim($keywords));

        $tokens = array_filter($tokens, function ($token) use ($stopWords) {
            $token = mb_strtolower(trim($token));
            return $token !== '' && !in_array($token, $stopWords);
        });

        if (empty($tokens)) {
            return response()->json([
                'reply' => 'Bạn vui lòng nhập rõ hơn nội dung cần tìm.'
            ]);
        }
        Log::info('Chatbot search tokens', ['tokens' => $tokens]);
        // TRUY VẤN DATABASE
        $books = SanPham::select('*')
                ->selectRaw("
                    (
                        " . implode(' + ', array_map(fn($t) =>
                            "IF(mo_ta_san_pham LIKE '%" . addslashes($t) . "%', 1, 0)"
                        , $tokens)) . "
                    ) / " . count($tokens) . " AS similarity
                ")
                ->where('status', 1)
                ->orderByDesc('similarity')
                ->limit(2)
                ->get();


        // KHÔNG TÌM THẤY
        if ($books->isEmpty()) {
            return response()->json([
                'reply' => 'Không tìm thấy sách phù hợp với yêu cầu của bạn.'
            ]);
        }

        // TRẢ KẾT QUẢ
        $reply = "Với nội dung bạn gửi, mình gợi ý bạn đọc:<br>";

        foreach ($books as $book) {
            $reply .= "\n• {$book->ten_san_pham}";
            if (!empty($book->tac_gia)) {
                $reply .= " (Tác giả: {$book->tac_gia}) " . mb_substr($book->mo_ta_san_pham, 0, 100) . '...<br>';
            }
        }

        return response()->json([
            'reply' => $reply
        ]);
    }
}
