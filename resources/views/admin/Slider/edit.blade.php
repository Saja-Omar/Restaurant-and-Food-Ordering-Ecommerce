@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Slider</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Update Slider</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.Slider.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- حقل الصورة -->
                <div class="form-group">
                    <label>Image</label>
                    <div id="image-preview" class="image-preview">
                        <!-- إذا كانت الصورة موجودة، يتم عرضها -->
                        @if($data->image)
                            <img id="image-output" src="{{ asset('storage/'.$data->image) }}" alt="Current Image" style="max-width: 200px; margin-top: 10px;">
                        @endif
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload" />
                    </div>
                </div>

                <!-- الحقول الأخرى -->
                <div class="form-group">
                    <label>Offer</label>
                    <input type="text" name="offer" class="form-control" value="{{ $data->offer }}">
                </div>

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $data->title }}">
                </div>

                <div class="form-group">
                    <label>Sub Title</label>
                    <input type="text" name="sub_title" class="form-control" value="{{ $data->sub_title }}">
                </div>

                <div class="form-group">
                    <label>Short Description</label>
                    <textarea name="short_desc" class="form-control">{{ $data->short_desc }}</textarea>
                </div>

                <div class="form-group">
                    <label>Button Link</label>
                    <input type="text" name="button_link" class="form-control" value="{{ $data->button_link }}">
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

@push('scripts')
    <script>
        $(document).ready(function(){
            // إضافة صورة المعاينة عند اختيار ملف
            $('#image-upload').change(function() {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#image-output').attr('src', e.target.result).show();  // إظهار الصورة الجديدة
                };
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endpush

@endsection
