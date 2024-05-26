<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Orders;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkPermission');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $users_count = User::query()->count();
        $oders_count = Orders::query()->count();
        $news_count = News::query()->where('deleted', 0)->count();

        $cartNum = $this-> getCartNum();
        return view('home', compact('users_count', 'oders_count', 'news_count','cartNum'));
    }

    public function getCartNum()
    {
        //Khởi tạo biến $cartList:
        $cartList = [];
        // Kiểm tra sự tồn tại của cookie 'cart':
        if (isset($_COOKIE['cart'])) {

            //Giải mã JSON từ cookie 'cart':
            $cartList = json_decode($_COOKIE['cart']);
            // For debugging: inspect the decoded cart list
            // error_log(print_r($cartList, true));
            // Khởi tạo biến đếm $num:
            $num = 0;
            // Duyệt qua các mặt hàng trong $cartList:
            foreach ($cartList as $item) {
                if (isset($item->num)) {
                    $num += $item->num;
                }
            }
            // Trả về tổng số lượng các mặt hàng:
            return $num;
        } else {
            // Xử lý khi cookie 'cart' không tồn tại:
            return 0;
        }
    }
}