<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
  name="viewport">
  <title>General Dashboard &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('admin/assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/toastr.min.css') }}">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('admin/assets/modules/jqvmap/dist/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/modules/weather-icon/css/weather-icons.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/modules/weather-icon/css/weather-icons-wind.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/modules/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/css/components.css')}}">

  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      @include('admin.layouts.sidepar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('admin/assets/modules/jquery.min.js')}}"></script>
  <script src="{{asset('admin/assets/modules/popper.js')}}"></script>
  <script src="{{asset('admin/assets/modules/tooltip.js')}}"></script>
  <script src="{{asset('admin/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/stisla.js')}}"></script>
  <script src="{{asset('admin/assets/js/toastr.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('admin/assets/js/page/index-0.js')}}"></script>
  <script src="{{asset('admin/assets/modules/summernote/summernote-bs4.js')}}"></script>


  <!-- Template JS File -->
  <script src="{{asset('admin/assets/js/scripts.js')}}"></script>
  <script src="{{asset('admin/assets/js/custom.js')}}"></script>

  <!-- JavaScript code for delete functionality -->
  {{-- <script>
    $(document).on('click', '.delete-item', function (e) {
        e.preventDefault();

        var sliderId = $(this).data('id');

        // استخدام SweetAlert2 لتأكيد الحذف
        Swal.fire({
            title: 'هل أنت متأكد؟',
            text: 'لا يمكنك استعادة هذا العنصر بعد الحذف!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'نعم، احذفه!',
            cancelButtonText: 'إلغاء'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/Slider/' + sliderId, // المسار الصحيح
                    method: 'DELETE',
                    data: {
                        '_token': '{{ csrf_token() }}', // إضافة التوكن الخاص بـ CSRF
                    },
                    success: function (response) {
                        // إذا كانت الاستجابة تشير إلى نجاح الحذف، يتم إظهار SweetAlert2 بنجاح
                        if(response.message === 'تم الحذف بنجاح') {
                            Swal.fire({
                                title: 'تم الحذف!',
                                text: 'تم حذف السلايدر بنجاح.',
                                icon: 'success',
                                timer: 3000,  // تظهر الرسالة لمدة 3 ثوانٍ (يمكنك زيادة الرقم حسب حاجتك)
                                showConfirmButton: false  // إخفاء زر التأكيد
                            });
                            location.reload(); // لتحديث الصفحة بعد الحذف
                        } else {
                            Swal.fire(
                                'حدث خطأ!',
                                'لم يتم الحذف بنجاح.',
                                'error'
                            );
                        }
                    },
                    error: function (xhr, status, error) {
                        Swal.fire(
                            'حدث خطأ!',
                            'حدث خطأ أثناء الحذف.',
                            'error'
                        );
                    }
                });
            }
        });
    });
</script> --}}
{{-- <script>
$(document).on('click', '.delete-item', function (e) {
    e.preventDefault();

    var itemId = $(this).data('id');
    var itemType = $(this).data('type');

    var url = '/admin/' + (itemType === 'category' ? 'Category/' : 'Slider/') + itemId;

    Swal.fire({
        title: 'هل أنت متأكد؟',
        text: 'لا يمكنك استعادة هذا العنصر بعد الحذف!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'نعم، احذفه!',
        cancelButtonText: 'إلغاء'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                method: 'DELETE',
                data: {
                    '_token': '{{ csrf_token() }}',
                },
                success: function (response) {
                    if(response.message === 'تم الحذف بنجاح') {
                        Swal.fire('تم الحذف!', 'تم حذف العنصر بنجاح.', 'success');
                        location.reload();
                    } else {
                        Swal.fire('حدث خطأ!', 'لم يتم الحذف بنجاح.', 'error');
                    }
                },
                error: function () {
                    Swal.fire('حدث خطأ!', 'حدث خطأ أثناء الحذف.', 'error');
                }
            });
        }
    });
});
</script> --}}
{{-- <script >
$(document).on('click', '.delete-item', function (e) {
    e.preventDefault();

    var itemId = $(this).data('id');
    var itemType = $(this).data('type');
    var url = '/admin/' + (itemType === 'category' ? 'Category/' : itemType === 'product' ? 'Product/' : 'Slider/') + itemId;

    Swal.fire({
        title: 'هل أنت متأكد؟',
        text: 'لا يمكنك استعادة هذا العنصر بعد الحذف!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'نعم، احذفه!',
        cancelButtonText: 'إلغاء'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                method: 'DELETE',
                data: {
                    '_token': '{{ csrf_token() }}', // CSRF token
                },
                success: function (response) {
                    if(response.message === 'تم الحذف بنجاح') {
                        Swal.fire('تم الحذف!', 'تم حذف العنصر بنجاح.', 'success');
                        location.reload(); // Reload the page after deletion
                    } else {
                        Swal.fire('حدث خطأ!', 'لم يتم الحذف بنجاح.', 'error');
                    }
                },
                error: function () {
                    Swal.fire('حدث خطأ!', 'حدث خطأ أثناء الحذف.', 'error');
                }
            });
        }
    });
});
</script> --}}

<script>
$(document).on('click', '.delete-item', function (e) {
    e.preventDefault();

    var itemId = $(this).data('id');
    var itemType = $(this).data('type');
    var url = '/admin/' + (itemType === 'category' ? 'Category/' : itemType === 'product' ? 'product/' : itemType === 'product-size' ? 'product-size/': 'Slider/') + itemId;

    Swal.fire({
        title: 'هل أنت متأكد؟',
        text: 'لا يمكنك استعادة هذا العنصر بعد الحذف!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'نعم، احذفه!',
        cancelButtonText: 'إلغاء'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                method: 'DELETE',
                data: {
                    '_token': '{{ csrf_token() }}', // CSRF token
                },
                success: function (response) {
                    if(response.message === 'تم الحذف بنجاح') {
                        Swal.fire('تم الحذف!', 'تم حذف العنصر بنجاح.', 'success');
                        location.reload(); // إعادة تحميل الصفحة بعد الحذف
                    } else {
                        Swal.fire('حدث خطأ!', 'لم يتم الحذف بنجاح.', 'error');
                    }
                },
                error: function () {
                    Swal.fire('حدث خطأ!', 'حدث خطأ أثناء الحذف.', 'error');
                }
            });
        }
    });
});

</script>


  <script>
    toastr.options.progressBar = true;

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif
  </script>

  @stack('scripts')
</body>
</html>
