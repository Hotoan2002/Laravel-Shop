<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        // Hiển thị form thanh toán và thông tin đặt hàng
        return view('checkout');
    }

    public function placeOrder(Request $request)
    {
        // Xử lý đẩy sản phẩm và thông tin lên cơ sở dữ liệu

        // Lấy thông tin giỏ hàng của người dùng (ví dụ: từ session, database, ...)
        $cartItems = Cart::all(); // Ví dụ lấy tất cả sản phẩm trong giỏ hàng

        // Tạo đối tượng đơn hàng mới
        $order = new Order();
        // Thiết lập thông tin cho đơn hàng (ví dụ: người đặt hàng, tổng giá trị, ...)
        $order->user_id = auth()->user()->id; // Ví dụ: lấy ID người dùng đã đăng nhập
        $order->total = $request->input('total'); // Ví dụ: lấy tổng giá trị từ form

        // Lưu đơn hàng vào cơ sở dữ liệu
        $order->save();

        // Lưu thông tin chi tiết đơn hàng (sản phẩm trong giỏ hàng) vào bảng liên kết (ví dụ: order_product)
        foreach ($cartItems as $item) {
            $order->products()->attach($item->product_id, ['quantity' => $item->quantity]);
        }

        // Xóa giỏ hàng sau khi đã đặt hàng thành công (tuỳ thuộc vào yêu cầu của bạn)
        // Ví dụ: Cart::where('user_id', auth()->user()->id)->delete();

        // Redirect hoặc hiển thị thông báo thành công
        return redirect()->route('checkout')->with('success', 'Order placed successfully.');
    }
}
