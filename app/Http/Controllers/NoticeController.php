<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'notice_email' => 'required|email',
        ]);

        // Lưu dữ liệu vào cơ sở dữ liệu
        $notification = new Notification();
        $notification->notice_email = $request->notice_email;
        $notification->save();

        // Redirect hoặc trả về thông báo thành công
        return redirect()->back()->with('success', 'Đăng ký gmail thành công');
    }
}
