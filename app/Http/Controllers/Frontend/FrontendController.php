<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Orders;
use Psy\Readline\Hoa\Console;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $productList = DB::table('product')
            ->where('deleted', 0)
            ->take(3)
            ->get();

        return view('frontend.home')->with([
            'productList' => $productList,
            'mainClass' => 'hero_area',
            'title' => 'Trang Chủ',
            'cartNum' => $this->getCartNum()
        ]);
    }

    public function category(Request $request)
    {
        $category = DB::table('category')
            ->orderBy('id', 'ASC')
            ->get();
        $listCategory = DB::table('category')
            ->first();

        $product = DB::table('product')
            ->where('category_id', '=', $listCategory->id)
            ->paginate(4);

        return view('frontend.category', compact('product'))->with([
            'category' => $category,
            'mainClass' => 'hero_area',
            'title' => 'Danh Mục Sản Phẩm',
            'cartNum' => $this->getCartNum()
        ]);
    }

    public function searchProducts(Request $request)
    {
        $searchTerm = $request->get('search');

        $productList = DB::table('product')
            ->where('deleted', 0)
            ->where('title', 'like', "%{$searchTerm}%")
            ->paginate(8);

        return view('frontend.product')->with([
            'mainClass' => 'sub_page',
            'title' => 'Kết quả tìm kiếm',
            'productList' => $productList,
            'cartNum' => $this->getCartNum()
        ]);
    }
    public function showProducts(Request $request)
    {
        $productList = DB::table('product')
            ->where('deleted', 0)
            ->paginate(8);

        return view('frontend.product')->with([
            'mainClass' => 'sub_page',
            'title' => 'Sản Phẩm',
            'productList' => $productList,
            'cartNum' => $this->getCartNum()
        ]);
    }

    public function showDetail(Request $request, $id, $href_param)
    {
        $detail = DB::table('product')
            ->where('deleted', 0)
            ->get();
        if ($detail == null || count($detail) == 0) {
            return view('frontend.error')->with([
                'mainClass' => 'sub_page',
                'title' => 'Không tồn tại',
                'cartNum' => $this->getCartNum()
            ]);
        }

        $productList = DB::table('product')
            ->where('deleted', 0)
            ->paginate(8);
        return view('frontend.detail')->with([
            'mainClass' => 'sub_page',
            'title' => $detail[0]->title,
            'detail' => $detail[0],
            'productList' => $productList,
            'cartNum' => $this->getCartNum()
        ]);
    }

    public function showNews(Request $request)
    {
        $newsList = DB::table('news')
            ->where('deleted', 0)
            ->paginate(9);

        return view('frontend.news')->with([
            'mainClass' => 'sub_page',
            'title' => 'Tin Tức',
            'newsList' => $newsList,
            'cartNum' => $this->getCartNum()
        ]);
    }

    public function showPost(Request $request, $id, $href_param)
    {
        $post = DB::table('news')
            ->where('deleted', 0)
            ->where('id', $id)
            ->get();
        if ($post == null || count($post) == 0) {
            return view('frontend.error')->with([
                'mainClass' => 'sub_page',
                'title' => 'Tin Tức',
                'cartNum' => $this->getCartNum()
            ]);
        }

        $newsList = DB::table('news')
            ->where('deleted', 0)
            ->take(3)
            ->get();
        return view('frontend.post')->with([
            'mainClass' => 'sub_page',
            'title' => $post[0]->title,
            'post' => $post[0],
            'newsList' => $newsList,
            'cartNum' => $this->getCartNum()
        ]);
    }

    public function showContact(Request $request)
    {
        return view('frontend.contact')->with([
            'mainClass' => 'sub_page',
            'title' => 'Liên Hệ',
            'cartNum' => $this->getCartNum()
        ]);
    }

    public function postContact(Request $request)
    {
        DB::table('feedback')->insert([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'subject_name' => $request->subject_name,
            'note' => $request->note,
        ]);

        return redirect()->route('frontend.contact');
    }

    public function showCart(Request $request)
    {
        $cartList = [];
        if (isset($_COOKIE['cart'])) {
            $cartList = json_decode($_COOKIE['cart']);
        }

        // Kiểm tra nếu $cartList là null hoặc trống
        if ($cartList == null || count($cartList) == 0) {
            return redirect()->route('home_index');
        }

        $idList = [];
        foreach ($cartList as $item) {
            // Kiểm tra xem item có thuộc tính id hay không
            if (isset($item->id)) {
                $idList[] = $item->id;
            }
        }

        // Truy vấn các sản phẩm không bị xóa và có id trong danh sách $idList
        $cartItems = DB::table('product')
            ->where('deleted', 0)
            ->whereIn('id', $idList)
            ->get();

        foreach ($cartItems as $cartItem) {
            foreach ($cartList as $item) {
                if ($cartItem->id == $item->id) {
                    $cartItem->num = isset($item->num) ? $item->num : 1; // Gán số lượng, mặc định là 1 nếu không tồn tại
                    break;
                }
            }
        }

        // Trả về view với các biến cần thiết
        return view('frontend.cart')->with([
            'mainClass' => 'sub_page',
            'title' => 'Giỏ Hàng',
            'cartItems' => $cartItems,
            'cartNum' => $this->getCartNum()
        ]);
    }



    public function showCheckout(Request $request)
    {
        $cartList = [];
        if (isset($_COOKIE['cart'])) {
            $cartList = json_decode($_COOKIE['cart']);
        }

        // Debug dữ liệu giỏ hàng
        Log::info('Cart List:', (array) $cartList);

        $idList = [];
        foreach ($cartList as $item) {
            if (isset($item->id)) {
                $idList[] = $item->id;
            }
        }

        $cartItems = DB::table('product')
            ->where('deleted', 0)
            ->whereIn('id', $idList)
            ->get();
        foreach ($cartItems as $cartItem) {
            foreach ($cartList as $item) {
                if ($cartItem->id == $item->id) {
                    $cartItem->num = isset($item->num) ? $item->num : 1; // Gán số lượng, mặc định là 1 nếu không tồn tại
                    break;
                }
            }
        }

        return view('frontend.checkout')->with([
            'mainClass' => 'sub_page',
            'title' => 'Thanh Toán',
            'cartItems' => $cartItems,
            'cartNum' => $this->getCartNum()
        ]);
    }




    public function completeCheckout(Request $request)
    {
        $cartList = [];
        if (isset($_COOKIE['cart'])) {
            $cartList = json_decode($_COOKIE['cart']);
        }

        // Kiểm tra nếu $cartList là null hoặc trống
        if ($cartList == null || count($cartList) == 0) {
            return redirect()->route('home_index');
        }

        $idList = [];
        foreach ($cartList as $item) {
            if (isset($item->id)) {
                $idList[] = $item->id;
            }
        }

        // Truy vấn các sản phẩm không bị xóa và có id trong danh sách $idList
        $cartItems = DB::table('product')
            ->where('deleted', 0)
            ->whereIn('id', $idList)
            ->get();

        $totalMoney = 0;
        foreach ($cartItems as $cartItem) {
            foreach ($cartList as $item) {
                if (isset($item->id) && isset($item->num) && $cartItem->id == $item->id) {
                    $cartItem->num = $item->num;
                    $totalMoney += $cartItem->num * $cartItem->discount;
                    break;
                }
            }
        }

        // Kiểm tra các trường bắt buộc trong yêu cầu
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        // Tạo đơn hàng mới
        $orderItem = Orders::create([
            'user_id' => null,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'note' => $request->note,
            'status' => 0,
            'order_date' => now(),
            'total_money' => $totalMoney
        ]);

        // Chèn chi tiết đơn hàng vào bảng order_details
        foreach ($cartItems as $item) {
            if (isset($item->num)) {
                DB::table('order_details')->insert([
                    'order_id' => $orderItem->id,
                    'product_id' => $item->id,
                    'price' => $item->discount,
                    'num' => $item->num,
                    'total_money' => $item->discount * $item->num
                ]);
            }
        }

        // Xóa cookie giỏ hàng
        setcookie("cart", '', time(), '/');

        return redirect()->route('home_index');
    }

    private function getCartNum()
    {
        $cartList = [];
        if (isset($_COOKIE['cart'])) {
            $cartList = json_decode($_COOKIE['cart']);
            $num = 0;
            foreach ($cartList as $items) {
                $num += $items->num;
            }

            return $num; // Trả về tổng số lượng sản phẩm trong giỏ hàng
        } else {
            return 0; // Nếu cookie 'cart' không tồn tại, trả về 0
        }
    }
}
