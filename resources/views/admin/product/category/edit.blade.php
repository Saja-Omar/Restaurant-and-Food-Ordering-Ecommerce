@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Category</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Update Category</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.Category.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <!-- الحقول الأخرى -->
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                </div>



                <div class="form-group">
                    <label>Show At Home</label>
                    <select name="show_at_home" class="form-control">
                        <option @selected($data->show_at_home === 1) value="1">Active</option>
                        <option @selected($data->show_at_home === 0) value="0">Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option @selected($data->status === 1) value="1">Active</option>
                        <option @selected($data->status === 0) value="0">Inactive</option>
                    </select>
                </div>

                <!-- زر التحديث -->
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</section>



@endsection
