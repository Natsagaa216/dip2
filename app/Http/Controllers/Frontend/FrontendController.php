<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Upcoming;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status',0)->get();
        $categories = Category::where('status',0)->get();
        return view('frontend.index', compact('sliders','categories'));
    }

    public function introduce()
    {
        return view('frontend.introduce'); // Point to the correct view file
    }

    public function login()
    {
        return view('frontend.login'); // Point to the correct view file
    }

    public function apparel()
    {
        return view('frontend.apparel'); // Point to the correct view file
    }
    public function music()
    {
        return view('frontend.music'); // Point to the correct view file
    }
    // public function upcoming()
    // {
    //     return view('frontend.upcoming.index'); // Point to the correct view file
    // }

    public function products()
    {
        $products = Product::where('status', 0)->where('quantity', '>', 0)->get();
        return view('frontend.product.index', compact('products'));
    }

    public function productShow($slug)
    {
        $product = Product::where('slug',$slug)->firstOrFail();

        $discounted_price = $product->price - ($product->sale_percent * $product->price)/ 100;

        $related_products = Product::where('sub_category_id', $product->sub_category_id)
            ->where('status',0)
            ->where('quantity', '>', 0)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('frontend.product.show', compact('product',
            'discounted_price',
            'related_products'));
    }

    public function productAddCart(Request $request)
    {

    }



    public function upcomings()
    {
        $upcomings = Upcoming::where('status', 0)->where('quantity', '>', 0)->get();
        return view('frontend.upcoming.index', compact('upcomings'));
    }

    public function upcomingShow($slug)
    {
        $upcoming = Upcoming::where('slug',$slug)->firstOrFail();

        $discounted_price = $upcoming->price - ($upcoming->sale_percent * $upcoming->price)/ 100;

        $related_upcomings = Upcoming::where('sub_category_id', $upcoming->sub_category_id)
            ->where('status',0)
            ->where('quantity', '>', 0)
            ->where('id', '!=', $upcoming->id)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('frontend.upcoming.show', compact('upcoming',
            'discounted_price',
            'related_upcomings'));
    }

    public function upcomingAddCart(Request $request)
    {

    }
}
