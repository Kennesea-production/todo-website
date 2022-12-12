<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" href="https://sp-ao.shortpixel.ai/client/q_glossy,ret_img,w_1024,h_1024/https://www.rumahcoding.co.id/wp-content/uploads/2020/11/Laravel-1024x1024.png">  
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">   
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/todo.css') }}">    --}}
</head>

<body>
    @if(Auth::check())
    <nav class="navbar sticky-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand text-white">Navbar</a>
          <button class="btn btn-outline-danger" type="submit"><a href="/logout" style="color:rgb(255, 255, 255);">Logout</a></button>
      </div>
    </nav>
      @endif 

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" 
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" 
    crossorigin="anonymous"></script>
</body>
</html>