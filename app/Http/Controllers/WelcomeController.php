<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Protype;

class WelcomeController extends Controller
{
    public function getPageFrontEnd($page = "index")
    {
        if ($page == 'shop'){
            $protypes = Protype::all();
            $products = Products::all();
            return view('FE/' . $page, ['products' => $products, 'protypes' => $protypes]);
        }else if ($page == 'detail'){
            $products = Products::all();
            return view('FE/' . $page, ['products' => $products]);
        }else if ($page == 'index'){
            $products = Products::where('protype_id','=', 2)->get();
            return view('FE/' . $page, ['products' => $products]);
        }else{
            return view('FE/' . $page);
        }
    }
    public function getPageBackEnd($page = 'layout')
    {
        return view('layout/' . $page);
    }
}
