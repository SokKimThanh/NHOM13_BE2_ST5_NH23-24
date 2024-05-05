<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Protype;

class WelcomeController extends Controller
{
    public function getPageFrontEnd($page = "index")
    {
        $protypes = Protype::all();
        $products = $page == 'index' ? Products::where('protype_id','=', 2)->get() : Products::all();
        $count = ceil(count($products)/6);
        $product = null;
        $protype = null;
        $pageShop = null;
        if(substr($page, 0, 6) == 'detail'){
            $product = Product::find(substr($page, 6));
            $protype = Protype::find($product -> protype_id) -> protype_name;
            $page = 'detail';
        }
        if(substr($page, 0, 4) == 'shop'){
            $pageShop = substr($page, 4);
            $page = 'shop';
        }
        return view('FE/' . ($page), ['products' => $products, 'protypes' => $protypes, 'product' => $product, 'protype' => $protype, 'pages' => $count, 'pageShop' => $pageShop]);
    }
    public function getPageProtype($id)
    {
        $protypes = Protype::all();


        if($id == 0){

            $products = Products::all();
            $count = ceil(count($products)/6);
        }else
        {
            $products = Products::where('protype_id','=', $id)->get();
            $count = ceil(count($products)/6);
        }
        // $count = ceil(count($products)/6);
        return view('FE/shop', ['products' => $products, 'protypes' => $protypes, 'pages' => $count, 'pageShop' => 1]);
    }
    public function getPageBackEnd($page = 'layout')
    {
        return view('layout/' . $page);
    }
}
