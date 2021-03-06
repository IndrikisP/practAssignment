<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    
            @include('inc.navbar')
            <div class="container">
                @include('inc.messages')
                
              @yield('content')
                
            
              </div>

             <!-- Editor for the post creation 
            <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
            <script>
                CKEDITOR.replace( 'article-ckeditor' );
            </script> -->
            <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
            <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
            <script>
                $('textarea').ckeditor();
                // $('.textarea').ckeditor(); // if class is prefered.
            </script>
</body>
</html>
