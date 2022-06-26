<?php

namespace App\Http\Controllers;

use App\Http\Filters\ProductFilter;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        $usersProductIds = [];
        if ($user = User::find(Auth::id())) {
            $usersProductIds = $user->products->pluck('id')->toArray();
        }
        $productIds = DB::table('orders')->select(DB::raw('product_id, count(product_id) as count'))
            ->groupBy('product_id')->orderBy('count', 'DESC')->whereNotIn('product_id', $usersProductIds)->limit(6)->get()->pluck('product_id')->toArray();
        $products = Product::find($productIds);

        return view('home.index', compact('products', 'usersProductIds'));

    }


    public function filter(ProductFilter $filter)
    {
        $products = Product::filter($filter)->paginate(6);
        return view('home.index', $products);
    }

    public function buy(Product $product)
    {
     Order::create(['user_id'=>Auth::id(),'product_id'=>$product->id]);
    return redirect()->route('homeIndex');
    }

    public function usersProducts(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $products = User::find(Auth::id())->products;
        return view('home.myProducts',compact('products'));
    }


}
