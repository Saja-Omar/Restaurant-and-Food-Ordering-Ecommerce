@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Slider</h1>
    </div>


        <div class="card card-primary">
          <div class="card-header">
            <h4>Card Header</h4>
            <div class="card-header-action">
              <a href="{{ route('admin.Slider.create') }}" class="btn btn-primary">
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
