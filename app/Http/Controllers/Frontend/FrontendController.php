<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Orders;

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
            ->where('category_id', '=', 1)
            ->paginate(4);

        return view('frontend.category', compact('product'))->with([
            'category' => $category,
            'mainClass' => 'hero_area',
            'title' => 'Danh Mục Sản Phẩm',
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
            ->leftJoin('category', 'category.id', '=', 'product.category_id')
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
        $idList = [];
        foreach ($cartList as $item) {
            $idList[] = $item->id;
        }

        $cartItems = DB::table('product')
            ->where('deleted', 0)
            ->whereIn('id', $idList)
            ->get();
        for ($i = 0; $i < count($cartItems); $i++) {
            for ($j = 0; $j < count($cartList); $j++) {
                if ($cartItems[$i]->id == $cartList[$j]->id) {
                    $cartItems[$i]->num = $cartList[$j]->num;
                    break;
                }
            }
        }

        return view('frontend.cart')->with([
            'mainClass' => 'sub_page',
            'title' => 'Giở Hàng',
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
        $idList = [];
        foreach ($cartList as $item) {
            $idList[] = $item->id;
        }

        $cartItems = DB::table('product')
            ->where('deleted', 0)
            ->whereIn('id', $idList)
            ->get();
        for ($i = 0; $i < count($cartItems); $i++) {
            for ($j = 0; $j < count($cartList); $j++) {
                if ($cartItems[$i]->id == $cartList[$j]->id) {
                    $cartItems[$i]->num = $cartList[$j]->num;
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
        if ($cartList == null || count($cartList) == 0) {
            return redirect()->route('home_index');
        }

        $idList = [];
        foreach ($cartList as $item) {
            $idList[] = $item->id;
        }

        $cartItems = DB::table('product')
            ->where('deleted', 0)
            ->whereIn('id', $idList)
            ->get();
        $totalMoney = 0;
        for ($i = 0; $i < count($cartItems); $i++) {
            for ($j = 0; $j < count($cartList); $j++) {
                if ($cartItems[$i]->id == $cartList[$j]->id) {
                    $cartItems[$i]->num = $cartList[$j]->num;
                    $totalMoney += $cartItems[$i]->num * $cartItems[$i]->discount;
                    break;
                }
            }
        }

        $orderItem = Orders::create([
            'user_id' => null,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'note' => $request->note,
            'status' => 0,
            'order_date' => date('Y-m-d H:i:s'),
            'total_money' => $totalMoney
        ]);

        foreach ($cartItems as $item) {
            DB::table('order_details')->insert([
                'order_id' => $orderItem->id,
                'product_id' => $item->id,
                'price' => $item->discount,
                'num' => $item->num,
                'total_money' => $item->discount * $item->num
            ]);
        }

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
            return $num;
        } else {
            return 0;
        }
    }
}