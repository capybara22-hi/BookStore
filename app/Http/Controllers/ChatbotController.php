<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\SanPham;

class ChatbotController extends Controller
{
     public function chat(Request $request)
    {
        // LẤY CÂU HỎI NGƯỜI DÙNG
        $input = trim($request->input('query', ''));

        if ($input === '') {
            return response()->json([
                'reply' => 'Bạn vui lòng nhập nội dung cần tìm.'
            ]);
        }

        // TÁCH KEYWORD TỪ CÂU HỎI
        $keywords = $this->extractKeywords($input);

        // TÌM SÁCH PHÙ HỢP NHẤT TRONG DB
        $books = $this->searchBooksByKeywords($keywords);

        // GỌI GEMINI ĐỂ VIẾT CÂU TRẢ LỜI
        $reply = $this->askGemini($books, $input);

        // TRẢ KẾT QUẢ
        return response()->json([
            'keywords' => $keywords,
            'books' => $books,
            'reply' => $reply
        ]);
    }

        /**
     * Tách câu hỏi thành các từ khóa quan trọng
     */
    private function extractKeywords(string $input): array
    {
        // Chuyển về chữ thường
        $text = mb_strtolower($input);

        // Tách từ theo khoảng trắng, dấu phẩy, dấu chấm
        $tokens = preg_split('/[\s,\.]+/u', $text);

        // Các từ gây nhiễu – không mang ý nghĩa tìm kiếm
        $stopWords = [
            'tôi','muốn','tìm','sách','về','cho','có','là','một','cuốn',
            'những','các','và','với','được','trong','thì','nào','hơn',
            'giúp','giới','thiệu'
        ];

        // Loại bỏ stop-word và từ rỗng
        return array_values(array_filter($tokens, function ($t) use ($stopWords) {
            return $t !== '' && !in_array($t, $stopWords);
        }));
    }

        /**
     * Tìm sách có nhiều keyword trùng khớp nhất
     */
    private function searchBooksByKeywords(array $keywords): array
    {
        if (empty($keywords)) {
            return [];
        }

        return SanPham::where('status', 1)
            ->get()
            ->map(function ($book) use ($keywords) {

                // Gộp nội dung để so khớp
                $text = mb_strtolower(
                    $book->ten_san_pham . ' ' .
                    $book->mo_ta_san_pham . ' ' .
                    $book->tac_gia
                );

                // Đếm số keyword xuất hiện
                $score = 0;
                foreach ($keywords as $k) {
                    if (str_contains($text, $k)) {
                        $score++;
                    }
                }

                return [
                    'ma_san_pham' => $book->ma_san_pham,
                    'ten' => $book->ten_san_pham,
                    'tac_gia' => $book->tac_gia,
                    'gia' => $book->gia_tien_sp,
                    'mo_ta' => $book->mo_ta_san_pham,
                    'score' => $score // điểm tương đồng
                ];
            })
            // Chỉ giữ sách có ít nhất 1 keyword trùng
            ->filter(fn($b) => $b['score'] > 0)
            // Sắp xếp theo độ phù hợp
            ->sortByDesc('score')
            // Lấy top 5
            ->take(5)
            ->values()
            ->toArray();
    }

    private function askGemini(array $books, string $question): string
    {

        if(str_contains($question, 'xin chào') || str_contains($question, 'chào bạn')){
            return "Chào bạn! Mình là chatbot tư vấn sách. Bạn cần mình giúp gì không?";
        }
        // Không có dữ liệu → không gọi AI
        if (empty($books)) {
            return "Mình chưa tìm được sách phù hợp với yêu cầu của bạn.";
        }

        // tạo text để hỏi gemini
        $prompt  = "Bạn là chatbot tư vấn sách.\n";
        $prompt .= "CHỈ sử dụng thông tin sau, KHÔNG được tự bịa:\n";
        $prompt .= json_encode($books, JSON_UNESCAPED_UNICODE);
        $prompt .= "\n\nCâu hỏi người dùng: {$question}\n";
        $prompt .= "Hãy trả lời tự nhiên, dễ hiểu, bằng tiếng Việt từ thông tin sách đã cho, từ đó tìm và trả lời câu hỏi đúng nhất cho người dùng.\n";
        $prompt .= "Nếu có nhiều sách, hãy xuống dòng bằng <br>.";

        $response = Http::withOptions([ 'verify' => false, //chỉ dùng cho test local không dùng ssl
                    ]) ->timeout(10) 
                    ->withHeaders([ 
                        'Content-Type' => 'application/json', 
                        'x-goog-api-key' => env('GEMINI_API_KEY'), 
                        ]) ->post( "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent", 
                        [ 'contents' => [ 
                            [ 'parts' => [ [ 
                                ['text' => $prompt] ] ] ] ] ] ); 
        Log::info('Gemini RAW response', [ 'status' => $response->status(), 'body' => $response->body(), ]); 
        if (!$response->successful()) {
            return "Chatbot hiện đang bận, vui lòng thử lại sau.";
        }

        return data_get(
            $response->json(),
            'candidates.0.content.parts.0.text',
            'Không thể tạo câu trả lời.'
        );
    }
}
