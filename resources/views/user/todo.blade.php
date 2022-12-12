@extends ('layout.user')

@section ('content')



    <div class="wrapper bg-dark">
            @if (Session::get('done'))
            <div class="alert alert-success">
            {{Session::get('done')}}
            </div>
            @endif
            @if (session('notAllowed'))
            <div class="alert alert-danger">
                    {{session('notAllowed')}}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">
                    {{session('success')}}
            </div>
            @endif
        <div class="d-flex justify-content-center align-item-center ">
            <div class="d-flex flex-column mt-2 mb-4">
                <div class="h5 text-center mb-3">My Todo's</div>
                <p class="text-muted text-justify">
                    Don't be lazy! here is activities you have to do!
                </p>
                <br>
            </div>
        </div>
            <div class="container-fluid align-item-center" style="border:  .5px solid white; height:45px; line-height:45px">
                <span>
                    <a href="/create" class="crt text-white ms-2 me-4" style="text-decoration:none; font-weight:600;">Create</a> 
                    
                    <a href="" class="text-success" style="text-decoration:none; font-weight:600;">Complated</a>
                </span>
            </div>
        <div class="work border-bottom pt-3">
            <div class="d-flex align-items-center py-2 mt-1">
                <div class="text-muted">{{$todos->count()}} todos</div>
                <button class="ml-auto btn bg-dark text-muted" type="button" data-toggle="collapse"
                    data-target="#comments" aria-expanded="false" aria-controls="comments"><i class="fa-solid fa-angle-down"></i></button>
            </div>
        </div>
        <div id="comments" class="mt-1">
            @foreach ($todos as $todo)
            <div class="comment d-flex align-items-start justify-content-between">
                <div class="mr-2">
                        @if ($todo['status'] == 1)
                        <span class="fa-regular fa-bookmark bmark ms-3"></span>
                        {{-- kalau statusnya selain dari 1, baru mjuncul icon checklist yang bisa diclick bbuat update ke complated 11--}}
                        @else 
                             <form action="/complated/{{$todo['id']}}"method="POST">
                               @csrf
                               @method('PATCH')
                               <button type="submit" class="fa-solid fa-circle-check chk ms-2"></button>
                             </form>
                        @endif
                    {{-- <label class="option">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label> --}}
                </div>
                <div class="d-flex flex-column w-75">
                    <p class="text-justify text-white" style="font-weight: 600">
                        {{-- /edit/{{$todo['id']}} --}}
                        {{ $todo['title']}}
                    </p>
                    <p class="text-white"> {{$todo['description']}} </p>
                    <p class="text-muted"> {{$todo ['status'] == 1 ? 'Completed' : 'On process'}}
                    <span class="date"> {{\Carbon\Carbon::parse($todo['date'])->format('j F, Y')}} </span>
                    </p>
                </div>
                <div class="ml-md-4 ml-0">
                    <span><a href="{{route('delete', $todo->id)}}" style="color: rgb(239, 239, 239)"><i class="fa-solid fa-trash me-3"></i></a></span>
                    <span><a href="{{route('edit', $todo->id)}}" style="color: rgb(239, 239, 239)"><i class="fa-solid fa-pen-to-square me-3"></i></a></span>
                </div>
            </div>
            @endforeach
            </div>

        </div>

    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

@endsection