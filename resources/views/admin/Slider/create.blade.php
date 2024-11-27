@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Slider</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Create Slider</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.Slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- حقل رفع الصورة مع معاينة -->
                <div class="form-group">
                    <label>Image</label>
                    <div id="image-preview" class="image-preview">
                        <!-- صورة المعاينة -->
                        <img id="image-output" src="#" alt="Image Preview" style="display: none; max-width: 200px; margin-top: 10px;">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload" class="form-control" />
                    </div>
                </div>

                <!-- باقي الحقول -->
                <div class="form-group">
                    <label>Offer</label>
                    <input type="text" name="offer" class="form-control">
                </div>

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label>Sub Title</label>
                    <input type="text" name="sub_title" class="form-control">
                </div>

                <div class="form-group">
                    <label>Short Description</label>
                    <textarea name="short_desc" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Button Link</label>
                    <input type="text" name="button_link" class="form-control">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <!-- زر الإرسال -->
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</section>

<!-- إضافة كود JavaScript -->
<script>
    document.getElementById('image-upload').addEventListener('change', function(event) {
        const imageOutput = document.getElementById('image-output');
        const file = event.target.files[0]; // الحصول على الملف الذي تم رفعه

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imageOutput.src = e.target.result; // عرض الصورة في العنصر <img>
                imageOutput.style.display = 'block'; // إظهار الصورة
            };
            reader.readAsDataURL(file); // قراءة الملف وتحويله إلى صيغة Base64
        } else {
            imageOutput.style.display = 'none'; // إخفاء الصورة إذا لم يتم اختيار ملف
        }
    });
</script>
@endsection
