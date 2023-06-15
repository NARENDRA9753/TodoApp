
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Todo App</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="img/ico" href='img/favicon-icon.png'>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://use.fontawesome.com/10a964325b.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>


<body>
    <!--////////////////TOP NAVBAR FIXED NAVBAR////////////////-->
    <div class="main-container">
        @include('layouts.nav')
        <section id="content_body">
        <div class="container">
        <div class="row">
            @yield('content')
        </div>
        </div> 
       </section>



    </div>

</body>

</html>
