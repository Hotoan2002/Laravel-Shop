<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function checkout(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            $user_id = Auth::user()->id;
        } else {
            // Yêu cầu người dùng đăng nhập hoặc xử lý logic khác nếu không muốn tiếp tục với người dùng chưa đăng nhập
            return redirect()->route('login');
        }

        // Tạo mã ngẫu nhiên 9 chữ số
        $code = Str::random(9);

        // Lưu vào bảng "orders"
        $order = Order::create([
            'code' => $code,
            'desc' => 'order',
            'user_id' => $user_id,
            'status' => 'pending',
        ]);

        // Lưu thông tin chi tiết đơn hàng vào bảng "orderdetails"
        $cart  = $request->session()->get('cart');

        foreach ($cart as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ]);
        }

        // Xóa giỏ hàng sau khi checkout
        $request->session()->forget('cart');

        // Thực hiện các hành động khác sau khi checkout thành công
        // ...

        return redirect()->route('cart');
    }
   
}
