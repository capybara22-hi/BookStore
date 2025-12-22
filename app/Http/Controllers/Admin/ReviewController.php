<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    // Show reviews with tabs: pending (admin_reply=0), replied (admin_reply=1), all
    public function index(Request $request)
    {
        $tab = $request->get('tab', 'pending');
        $q = $request->get('q');

        $query = Review::with(['user', 'sanpham']);

        if ($tab === 'pending') {
            $query->where('admin_reply', 0);
        } elseif ($tab === 'replied') {
            $query->where('admin_reply', 1);
        }

        if ($q) {
            $query->where(function($s) use ($q) {
                $s->where('comment', 'like', "%$q%")
                  ->orWhereHas('user', function($u) use ($q) { $u->where('name','like',"%$q%"); })
                  ->orWhereHas('sanpham', function($p) use ($q) { $p->where('ten_san_pham','like',"%$q%"); });
            });
        }

        $reviews = $query->orderBy('ma_danh_gia','desc')->paginate(30)->appends($request->query());

        return view('admin.reviews.index', compact('reviews','tab'));
    }

    // Mark as replied (set admin_reply = 1)
    public function markReplied($id)
    {
        $r = Review::findOrFail($id);
        $r->admin_reply = 1;
        $r->save();
        return redirect()->back()->with('success','Đã đánh dấu là đã phản hồi');
    }

    // Save admin reply into `danh_gia` and mark admin_reply = 1
    public function reply(Request $request, $id)
    {
        $request->validate([
            'danh_gia' => 'required|string'
        ]);

        $r = Review::findOrFail($id);
        $r->danh_gia = $request->danh_gia;
        $r->admin_reply = 1;
        $r->save();

        return redirect()->back()->with('success', 'Đã gửi phản hồi');
    }

    // Toggle hide/show (is_hidden: 0/1)
    public function toggleHide($id)
    {
        $r = Review::findOrFail($id);
        $r->is_hidden = $r->is_hidden ? 0 : 1;
        $r->save();
        return redirect()->back()->with('success','Đã cập nhật trạng thái ẩn/hiện');
    }

    public function destroy($id)
    {
        $r = Review::findOrFail($id);
        $r->delete();
        return redirect()->back()->with('success','Đã xóa đánh giá');
    }
}
