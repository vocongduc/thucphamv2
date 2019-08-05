<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HaiThuWeb-@yield('title')</title>
    <base href="{{asset('')}}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('') }}/assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('') }}/assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('') }}/assets/admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('') }}/assets/admin/bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet"
          href="{{ asset('') }}/assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('') }}/assets/admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('') }}/assets/admin/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/admin/dist/css/toastr.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/assets/admin/dist/js/html5shiv.min.js"></script>
    <script src="/assets/admin/dist/js/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="assets/admin/dist/css/sans.css">
    {{-- ck --}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    {{-- tag --}}
    <link rel="stylesheet" type="text/css" href="{{asset('')}}tag/dist/jquery-tagsinput.min.css"/>
    <script src="{{asset('')}}tag/dist/jquery-tagsinput.min.js" defer></script>
    {{-- endtag --}}
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        @include('admin.layouts.header')
    </header>

@include('admin.layouts.menu')
<!-- Content Wrapper. Contains page content -->
            @yield('content')
    <!-- /.content-wrapper -->

    @include('admin.layouts.footer')
    {{-- modal lienhe? --}}
    <div class="container container-fluid">
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h2 class="modal-title">Thông tin người dùng liên hệ</h2>
                        {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button> --}}
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" id="cont">

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<script>
    function show(id){
            var fullname = $('#fullname'+id).val();
            var phone = $('#phone'+id).val();
            var content = $('#content'+id).val();
            var email = $('#email'+id).val();
            var title = $('#title'+id).val();
            document.getElementById('cont').innerHTML= 
                        '<b style="text-align: center">'+title+"</b>"
                        +"<hr>"
                        +"<div><b>-Họ và Tên:</b>"+ fullname+"</div>"
                        +"<div><b>-SĐT:</b> "+phone+"</div>"
                        +"<div><b>-Email:</b> "+email+"</div>"
                        +"<div><b>-Nội dung:</b> <br>  "  + content+"</div>"
                        +"<hr>"
                        +"<div class='container container-fluid'>"
                        +"<a href='mailto:"+email+"' class='btn btn-success' type='button'>Trả lời</a>"
                        +"</div>"
                        +"<hr>";
                        
        }
</script>
{{-- end modal lien he --}}
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>
</body>
<script src="{{ asset('') }}/assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('') }}/assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
{{-- tags --}}
<script>
    $(document).ready(function () {
        $('[data-role="tags-input"]').tagsInput();
    });
</script>
</html>
