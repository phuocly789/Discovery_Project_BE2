<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'client_comment' => 'required|string',
            'client_address' => 'required|string',
            'client_image' => 'nullable|image',  // Đảm bảo là file hình ảnh
            'tour_id' => 'required|integer',
        ]);

        // Kiểm tra nếu người dùng không chọn ảnh
        if (empty($validatedData['client_image'])) {
            $validatedData['client_image'] = 'noAvatar.jpg';
            $new_image = 'noAvatar.jpg';  // Đặt giá trị cho $new_image khi không có ảnh
        } else {
            // Nếu người dùng chọn ảnh
            $get_imgae = $request->file('client_image'); // Lấy tệp đã upload

            if ($get_imgae && $get_imgae->isValid()) {
                $get_name_image = $get_imgae->getClientOriginalName(); // Lấy tên tệp gốc
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 999) . '.' . $get_imgae->getClientOriginalExtension(); // Tạo tên tệp mới
                // Di chuyển tệp vào thư mục public/img
                $get_imgae->move(public_path('img'), $new_image); 
            } else {
                // Nếu ảnh không hợp lệ, gán giá trị mặc định
                $new_image = 'noAvatar.jpg';
            }
        }

        // Tạo một client mới và lưu vào cơ sở dữ liệu
        $client = new Client;
        $client->client_comment = $validatedData['client_comment'];
        $client->client_name = Auth::user()->name; // Lấy tên của người dùng đăng nhập
        $client->client_address = $validatedData['client_address'];
        $client->client_image = $new_image; // Gán ảnh vào cơ sở dữ liệu
        $client->user_id = Auth::user()->id; // Lấy ID của người dùng đăng nhập
        $client->tour_id = $validatedData['tour_id'];

        // Lưu bình luận vào cơ sở dữ liệu
        $client->save();

        // Redirect back or to a success page
        return redirect()->back()->with('success', 'Bình luận đã được gửi thành công!');
    }
}
