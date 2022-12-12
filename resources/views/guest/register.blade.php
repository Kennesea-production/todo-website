@extends ('layout.guest')

@section ('content')

<div class="card-parent h-100">
    <div class="carrd container-fluid ">
      <div class="row">

        <div class="col-sm-6 px-0 d-none d-sm-block">
            <img src="{{asset('assets/img/bookself.jpg')}}"
              alt="Login image" class="w-100 fixed" style="object-fit: cover; object-position: left;">
          </div>

          <div class="cared container py-5 h-100 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-xl-10 ">
                <div class="card crd-form rounded-3  text-black bg-transparent">
                  <div class="row ">
                    
                    <div class="col-lg-6 d-flex align-items-center ">

                    </div>

                    <div class="col-lg-6">
                        <div class="card-body p-md-5 mx-md-4">
          
          
                          <form method="POST" action="{{route('register.input')}}">
                            @csrf
                            @if (session('status'))
                            <div class="alert alert-danger">
                                    {{session('status')}}
                            </div>
                            @endif
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <p class="title-form">Please Register Your Account!</p>
          
                            <div class="form-outline mb-4">
                              <label class="form-label lbel" for="form2Example11">Name</label>
                              <input type="text" class="form-control" id="usernamme" name="name"  placeholder="Input your Name">
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label lbel" for="form2Example12">Username</label>
                              <input type="text" id="form2Example11" class="form-control" name="username" placeholder="Input your Username" />
                            </div>

                            <div class="form-outline mb-4">
                              <label class="form-label lbel" for="form2Example21">Email</label>
                              <input type="email" class="form-control" id="username" name="email"  placeholder="Input your Email address" >
                            </div>
          
                            <div class="form-outline mb-4">
                                <label class="form-label lbel" for="form2Example22">Password</label>
                              <input type="password" id="form2Example22" class="form-control" name="password"  placeholder="Input your Password"/>
                            </div>
          
                            <div class="text-center pt-1 mb-5 pb-1">
                              <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 sbmt" type="submit">Submit</button>
                            </div>

                            <div class="d-flex align-items-center justify-content-center pb-4">
                              <p class="mb-0 me-2">Already have an account?</p>
                              <button type="button" class="btn btn-outline-danger"><a class="toregister" href="/login">Go Login<a></button>
                            </div>
          
                          </form>
          
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <div class="col-sm-6">
  
  
        </div>

      </div>
    </div>

        
    </div>

</div>

<!-- <div class="container-fluid bg-danger vh-100" style="background-image: url(https://i.pinimg.com/474x/d6/fb/df/d6fbdfc0967b2099674b208f16b0db41.jpg); width: 100%; object-fit:cover;"> -->
{{-- <div class="container-fluid" style="background-color: #0C0C0C;">
<div class="row justify-content-center" >
  <div class="col-auto align-self-center">
<div class="card  " style="width: 30rem; background-color: #202020" >

  <div class="card-body">
  <h4 class="card-title mb-3 text-white text-center mb-4 fs-3">Login</h4>
  <form action="" method="POST">
    @if (session('notAllowed'))
    <div class="alert alert-danger">
            {{session('notAllowed')}}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
            {{session('error')}}
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success">
            {{session('success')}}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @csrf
    
  <div class="mb-3">
      <label for="exampleInputUsername1" class="form-label text-white">Username</label>
      <input type="username" class="form-control" placeholder="" id="username" name="username">
    </div>
    <div class="mb-4 ">
      <label for="exampleInputPassword1" class="form-label text-white">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
  <button type="submit" class="btn btn-primary bg-white text-black mb-3" style="border: none">Submit</button>
  <div class="text-center mb-3"><p class="text-white">didn't have an account? <a href="/register" style="color: #bbf9ff">Register</a></p>
</form>
</div>
</div>
</div>
</div>
</div> --}}
@endsection