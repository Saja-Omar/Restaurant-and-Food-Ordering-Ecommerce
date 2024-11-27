<?php

namespace App\Http\Controllers\Admin;

use Str;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ProductCreateRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $product)
    {
           return $product->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=Category::all();
        return view('admin.product.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {
        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('uploads', 'public');
          //  dd($imagePath);
        }

        $data = $request->validated();

        $data['slug'] = \Str::slug($data['name']);

        $data['thumb_image'] = $imagePath ?? null;

        Product::create($data);

        return redirect()->route('admin.product.index')->with('success', 'Product created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories=Category::all();
        $product=Product::findOrFail($id);
        return view('admin.product.edit',compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($product->thumb_image) {
                Storage::disk('public')->delete($product->thumb_image);
            }

            $imagePath = $request->file('image')->store('uploads', 'public');
        } else {
            $imagePath = $product->thumb_image;
        }

        $data = $request->validated();

        $data['slug'] = \Str::slug($data['name']);

        $data['thumb_image'] = $imagePath;

        $product->update($data);

        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $product = Product::find($id); // Corrected to use the Product model
    //     if ($product) {
    //         if ($product->thumb_image) {
    //             Storage::disk('public')->delete($product->thumb_image); // Delete the image if exists
    //         }
    //         $product->delete(); // Delete the product
    //         return response()->json(['message' => 'تم الحذف بنجاح']);
    //     }
    //     return response()->json(['message' => 'لم يتم العثور على العنصر'], 404);
    // }
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if ($product) {
            if ($product->thumb_image) {
                Storage::disk('public')->delete($product->thumb_image);
            }
            $product->delete(); //
            return response()->json(['message' => 'تم الحذف بنجاح']);
        }
        return response()->json(['message' => 'لم يتم العثور على العنصر'], 404);
    }

}
