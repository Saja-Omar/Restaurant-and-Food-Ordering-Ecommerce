@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Product</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Create Product</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Image Preview and Upload -->
                <div class="form-group">
                    <label>Image</label>
                    <div id="image-preview"
                         class="image-preview"
                         style="background-image: url('{{ old('thumb_image', isset($product) ? asset('storage/' . $product->thumb_image) : '') }}');
                                background-size: cover;
                                background-position: center;">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload" />
                    </div>
                </div>

                <!-- Name -->
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>

                <!-- Category -->
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control select2">
                        <option value="">Select</option>
                        @foreach ($data as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Price -->
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                </div>

                <!-- Offer Price -->
                <div class="form-group">
                    <label>Offer Price</label>
                    <input type="text" name="offer_price" class="form-control" value="{{ old('offer_price') }}">
                </div>

                <!-- Quantity -->
                {{-- <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" name="quantity" class="form-control" value="{{ old('quantity') }}">
                </div> --}}

                <!-- Short Description -->
                <div class="form-group">
                    <label>Short Description</label>
                    <textarea name="short_description" class="form-control">{{ old('short_description') }}</textarea>
                </div>

                <!-- Long Description -->
                <div class="form-group">
                    <label>Long Description</label>
                    <textarea name="long_description" class="form-control summernote">{{ old('long_description') }}</textarea>
                </div>

                <!-- SKU -->
                <div class="form-group">
                    <label>Sku</label>
                    <input type="text" name="sku" class="form-control" value="{{ old('sku') }}">
                </div>

                <!-- SEO Title -->
                <div class="form-group">
                    <label>Seo Title</label>
                    <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title') }}">
                </div>

                <!-- SEO Description -->
                <div class="form-group">
                    <label>Seo Description</label>
                    <textarea name="seo_description" class="form-control">{{ old('seo_description') }}</textarea>
                </div>

                <!-- Show at Home -->
                <div class="form-group">
                    <label>Show at Home</label>
                    <select name="show_at_home" class="form-control">
                        <option value="1">Yes</option>
                        <option selected value="0">No</option>
                    </select>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</section>

<!-- JavaScript for Image Preview -->
<script>
    document.getElementById('image-upload').addEventListener('change', function(event) {
        const preview = document.getElementById('image-preview');
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.style.backgroundImage = `url('${e.target.result}')`;
                preview.style.backgroundSize = "cover";
                preview.style.backgroundPosition = "center";
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
