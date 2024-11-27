@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Product</h1>
    </div>


        <div class="card card-primary">
          <div class="card-header">
            <h4>All Product</h4>
            <div class="card-header-action">
              <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                Creat New
              </a>
            </div>
          </div>
          <div class="card-body">
            <p>{{ $dataTable->table() }}</p>
          </div>
        </div>

        @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush

</section>
@endsection

