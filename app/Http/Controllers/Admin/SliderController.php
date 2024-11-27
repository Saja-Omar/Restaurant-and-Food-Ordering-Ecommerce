<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\DataTables\BannerSliderDataTable;
use App\Http\Requests\Admin\SliderCreatRequest;
use App\Http\Requests\Admin\SliderUpdateRequest;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {

        return $dataTable->render('admin.Slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.Slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderCreatRequest $request)
    {


        $validatData=$request->validated();
        $validatData['image']=$request->file('image')->store('uploads','public');
        Slider::create( $validatData);
        return redirect()->route('admin.Slider.index')->with('success', 'Slider created successfully!');

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
        $data=Slider::findOrFail($id);
        return view('admin.Slider.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderUpdateRequest $request, string $id)
    {


        $data = Slider::findOrFail($id);
          $validated = $request->validated();

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $data->image);

            $validated['image'] = $request->file('image')->store('uploads', 'public');
        }

        $data->update($validated);

        return redirect()->route('admin.Slider.index')->with('success', 'Slider updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        if ($slider) {
            $slider->delete();  
            return response()->json(['message' => 'تم الحذف بنجاح']);
        }
        return response()->json(['message' => 'لم يتم العثور على العنصر'], 404);
    }



}




