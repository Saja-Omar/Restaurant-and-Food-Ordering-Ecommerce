<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CategoryDataTable;
use App\Http\Requests\Admin\CategoryCreateRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $datatable)
    {
            return $datatable->render('admin.product.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.product.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = \Str::slug($data['name']);

        Category::create($data);

        return redirect()->route('admin.Category.index')->with('success', 'Category created successfully!');
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
        $data=Category::findOrFail($id);
        return view('admin.product.category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id)
    {
       $data=Category::findOrFail($id);
       $valid_data=$request->validated();
       if($valid_data['name'] !==  $data->name){
        $valid_data['slug'] = \Str::slug($valid_data['name']);
       }
       $data->update($valid_data);
       return redirect()->route('admin.Category.index')->with('success', 'Category updated successfully!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Category::findOrFail($id);
        $data->delete();

        return response()->json([
            'message' => 'تم الحذف بنجاح',
            'status' => true,
        ]);
    }

}
