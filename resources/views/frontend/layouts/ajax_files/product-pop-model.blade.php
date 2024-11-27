<form action="javascript:void(0);" id="modal_add_to_cart_form">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">

    <div class="fp__cart_popup_img text-center mb-3">
        <img src="{{ asset('storage/'.$product->thumb_image) }}" alt="{{ $product->name }}" class="img-fluid rounded">
    </div>

    <div class="fp__cart_popup_text">
        <a href="{{ route('product.show', $product->slug) }}" class="title d-block mb-2">{!! $product->name !!}</a>
        <p class="rating mb-3">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <i class="far fa-star"></i>
            <span>(201)</span>
        </p>

        <h4 class="price mb-3">
            @if ($product->offer_price > 0)
                <input type="hidden" name="base_price" value="{{ $product->offer_price }}">
                <span class="text-success fw-bold">{{ currencyPosition($product->offer_price) }}</span>
                <del class="text-muted ms-2">{{ currencyPosition($product->price) }}</del>
            @else
                <input type="hidden" name="base_price" value="{{ $product->price }}">
                <span class="text-success fw-bold">{{ currencyPosition($product->price) }}</span>
            @endif
        </h4>

        @if ($product->productSizes()->exists())
        <div class="details_size mb-3">
            <h5 class="fw-bold">Select Size</h5>
            @foreach ($product->productSizes as $productSize)
            <div class="form-check mb-2">
                <input class="form-check-input" type="radio" value="{{ $productSize->id }}" data-price="{{ $productSize->price }}" name="product_size" id="size-{{ $productSize->id }}">
                <label class="form-check-label" for="size-{{ $productSize->id }}">
                    {{ $productSize->name }} <span class="text-muted">+ {{ currencyPosition($productSize->price) }}</span>
                </label>
            </div>
            @endforeach
        </div>
        @endif

        @if ($product->productOptions()->exists())
        <div class="details_options mb-3">
            <h5 class="fw-bold">Select Options</h5>
            @foreach ($product->productOptions as $option)
            <div class="form-check mb-2">
                <input class="form-check-input option-input" type="checkbox" value="{{ $option->id }}" data-price="{{ $option->price }}" name="product_option[]" id="option-{{ $option->id }}">
                <label class="form-check-label" for="option-{{ $option->id }}">
                    {{ $option->name }} <span class="text-muted">+ {{ currencyPosition($option->price) }}</span>
                </label>
            </div>
            @endforeach
        </div>
        @endif

        <div class="details_quantity mb-3">
            <h5 class="fw-bold">Select Quantity</h5>
            <div class="d-flex align-items-center">
                <button class="btn btn-danger decrement me-2"><i class="fal fa-minus"></i></button>
                <input type="text" id="quantity" name="quantity" class="text-center form-control w-25" placeholder="1" value="1" readonly>
                <button class="btn btn-success increment ms-2"><i class="fal fa-plus"></i></button>
            </div>
            <h3 id="total_price" class="mt-3 fw-bold">{{ currencyPosition($product->offer_price > 0 ? $product->offer_price : $product->price) }}</h3>
        </div>

        <ul class="details_button_area d-flex flex-wrap mt-3">
            <li><button type="submit" class="btn btn-secondary w-100">Add to Cart</button></li>
        </ul>
    </div>
</form>

<style>
    .fp__cart_popup_img img {
        max-width: 70%;
        height: auto;
    }
    .details_size, .details_options {
        margin-top: 15px;
    }
    .form-check {
        margin-bottom: 10px;
    }
    .details_quantity .form-control {
        width: 50px;
    }

    .form-check-input {
        width: 15px;
        height: 15px;
        margin-top: 3px;
        transform: scale(0.8); /* تقليص حجم المربع */
    }

    .details_button_area .btn-secondary {
        background-color: #ff7f32;
        border-color: #ff7f32;
    }
    .details_button_area .btn-secondary:hover {
        background-color: #e66a2e;
        border-color: #e66a2e;
    }

    .details_button_area .btn-primary {
        background-color: #ff7f32;
        border-color: #ff7f32;
    }

    .details_button_area .btn-primary:hover {
        background-color: #e66a2e;
        border-color: #e66a2e;
    }
</style>



<script>
    $(document).ready(function(){
        // Update total price when size, options, or quantity changes
        $('input[name="product_size"], input[name="product_option[]"]').on('change', function(){
            updateTotalPrice();
        });

        $('.increment').on('click', function(e){
            e.preventDefault();
            let quantity = $('#quantity');
            let currentQuantity = parseFloat(quantity.val());
            quantity.val(currentQuantity + 1);
            updateTotalPrice();
        });

        $('.decrement').on('click', function(e){
            e.preventDefault();
            let quantity = $('#quantity');
            let currentQuantity = parseFloat(quantity.val());
            if(currentQuantity > 1){
                quantity.val(currentQuantity - 1);
                updateTotalPrice();
            }
        });

        // Function to update the total price dynamically
        function updateTotalPrice() {
            let basePrice = parseFloat($('input[name="base_price"]').val());
            let selectedSizePrice = 0;
            let selectedOptionsPrice = 0;
            let quantity = parseFloat($('#quantity').val());

            // Get selected size price
            let selectedSize = $('input[name="product_size"]:checked');
            if (selectedSize.length > 0) {
                selectedSizePrice = parseFloat(selectedSize.data("price"));
            }

            // Get selected options price
            let selectedOptions = $('input[name="product_option[]"]:checked');
            $(selectedOptions).each(function(){
                selectedOptionsPrice += parseFloat($(this).data("price"));
            });

            // Calculate total price
            let totalPrice = (basePrice + selectedSizePrice + selectedOptionsPrice) * quantity;
            $('#total_price').text("{{ config('settings.site_currency_icon') }}" + totalPrice.toFixed(2));
        }

        // Form submission handler
        $("#modal_add_to_cart_form").on('submit', function(e){
            e.preventDefault();
            let selectedSize = $("input[name='product_size']:checked");
            if (selectedSize.length === 0) {
                toastr.error('Please select a size');
                return;
            }
            toastr.success('Product added to cart!');
        });
    });
</script>
