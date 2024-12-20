@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Profile</h1>
    </div>

    <div class="section-body">
  <div class="card card-primary">
            <div class="card-header">
            <h4>Update User Settings </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.profile.update') }}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name='name' value="{{ auth()->user()->name }}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name='email' value="{{ auth()->user()->email }}">
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
          </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
            <h4>Update Password </h4>
            </div>
            <div class="card-body">
                {{-- <form action="{{ route('admin.profile.password.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" class="form-control" name="Current-Password">
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="Password">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="Password-confirmation">
                    </div>

                    <button class="btn btn-primary" type="submit">Save</button>
                </form> --}}

                <form action="{{ route('admin.profile.password.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" class="form-control" name="current_password">
                    </div>

                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>

                    <button class="btn btn-primary" type="submit">Save</button>

                </form>

            </div>
        </div>


        </div>
        <script>
            toastr.options.progressBar = true;

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            @endif
        </script>
        </section>
@endsection
