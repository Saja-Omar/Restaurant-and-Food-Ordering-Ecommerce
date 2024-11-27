<?php

namespace App\Http\Controllers\FrontEnd;
use Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class FrontEndController extends Controller
{
    function index():View{

        $slider=Slider::where('status',1)->get();
        $categories = Category::where(['show_at_home' => 1, 'status' => 1])->get();
        return  view('frontend.Home.index',compact('slider','categories'));
    }


    function dashindex():View{

        return  view('frontend.dashboard.index');
    }

    // function oo():View{

    //     return  view('frontend.dashboard.index');
    // }

    function showProduct(string $slug):View{
        $product=Product::where(['slug'=>$slug,'status'=>1])->firstOrFail();
        $relatedProducts=Product::where('category_id',$product->category_id)
        ->where('id','!=',$product->id)->take(8)->latest()->get();

                 return view('frontend.pages.product-view',compact('product','relatedProducts'));
    }


    function load_ProductModal($productId){
        $product=Product::with(['productSizes','ProductOptions'])->findOrFail($productId);


          return view('frontend.layouts.ajax_files.product-pop-model',compact('product') )->render();


    }



        public function addToCart(Request $request)
        {
            $product = Product::with(['productSizes', 'productOptions'])->findOrFail($request->product_id);

            if ($product->quantity < $request->quantity) {
                throw ValidationException::withMessages(['Quantity is not available!']);
            }

            try {
                $productSize = $product->productSizes->where('id', $request->product_size)->first();
                $productOptions = $product->productOptions->whereIn('id', $request->product_option);

                $options = [
                    'product_size' => [],
                    'product_options' => [],
                    'product_info' => [
                        'image' => $product->thumb_image,
                        'slug' => $product->slug
                    ]
                ];

                if ($productSize !== null) {
                    $options['product_size'] = [
                        'id' => $productSize->id,
                        'name' => $productSize->name,
                        'price' => $productSize->price
                    ];
                }

                foreach ($productOptions as $option) {
                    $options['product_options'][] = [
                        'id' => $option->id,
                        'name' => $option->name,
                        'price' => $option->price
                    ];
                }

                $basePrice = $product->offer_price > 0 ? $product->offer_price : $product->price;
                $sizePrice = $productSize ? $productSize->price : 0;
                $totalPrice = ($basePrice + $sizePrice) * $request->quantity;

                Cart::add([
                    'id' => $product->id,
                    'name' => $product->name,
                    'qty' => $request->quantity,
                    'price' => $totalPrice, //
                    'weight' => 0,
                    'options' => $options
                ]);

                return response(['status' => 'success', 'message' => 'Product added to cart successfully!'], 200);
            } catch (\Exception $e) {
                logger($e);
                return response(['status' => 'error', 'message' => 'Something went wrong!'], 500);
            }
        }










}
