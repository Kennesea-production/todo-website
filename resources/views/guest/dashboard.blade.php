@extends ('layout.guest')

@section ('content')

  
  <nav class="navbar navbar-expand-lg" style="background-color: rgb(6, 10, 12)">
    <div class="container">
      <span class="greet navbar-text">
        Hello Guest! Welcome!
      </span>
      <div class="navbar-collapse justify-content-end">
        <ul class="navbar-nav navbar-dark">
          <li class="bgnv nav-item px-2 justify-content-center ">
            <a class="nvbr nav-link active"  href="#">Home</a>
          </li>
          {{-- <li class="bgnvv nav-item  px-2 justify-content-center">
            <a class="nvbr nav-link" href="#">About</a>
          </li> --}}
          <li class="bgnvv nav-item  px-2 justify-content-center">
            <a class="nvbr nav-link" href="/register">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<div class="backg" >
    <img class="img1" src="{{asset('assets/img/bg.jpg')}}" alt="">
    <img class="img2" src="{{asset('assets/img/paper.png')}}" alt="">
    <img class="img3" src="{{asset('assets/img/book.png')}}" alt="">
    <div class="parenttext">
        <h2 class="title">To Do Website</h2>
        <p class="desc"> 
            a website to help you list your tasks, planning daily
            schedule and make you more productive. what are you 
            waiting for?go click this button below!
        </p>
        <a href="/login" class="btn0 btn btn-outline-dark btn-lg" role="button">Login Page</a>
    </div>
</div>

{{-- <div class="container-fluid vh-100 " style="background-color:white "></div> --}}



@endsection