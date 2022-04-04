<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('assets/assets/images/favicon.png')}}">
    <!-- Page Title  -->
    <title>Dashboard</title>
    <!-- StyleSheets  -->
    <link href="{{ asset('assets/assets/css/dashlite.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/assets/css/theme.css')}}" rel="stylesheet" type="text/css" />
    <link  href="{{ asset('assets/assets/css/editors/summernote.css')}}" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" integrity="sha256-n3YISYddrZmGqrUgvpa3xzwZwcvvyaZco0PdOyUKA18=" crossorigin="anonymous" />

</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">


            @include('includes.sidebar')





            @yield('content')






             <!-- footer @s -->
             <div class="nk-footer">
                <div class="container-fluid">
                    <div class="nk-footer-wrap">
                        <div class="nk-footer-copyright"> &copy; 2020 DashLite. Template by <a href="https://softnio.com" target="_blank">Softnio</a>
                        </div>
                        <div class="nk-footer-links">
                            <ul class="nav nav-sm">
                                <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{ asset('assets/assets/js/bundle.js')}}"></script>
<script src="{{ asset('assets/assets/js/scripts.js')}}"></script>
<script src="{{ asset('assets/assets/js/libs/datatable-btns.js')}}"></script>
<script src="{{ asset('assets/assets/js/editors.js')}}"></script>
<script src="{{ asset('assets/assets/js/libs/editors/summernote.js')}}"></script>

</body>

</html>
