@extends ('layout.user')

@section ('content')


<div class="container content">  
    <form id="create-form" method="POST" action="{{route('store')}}">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
      <h3 class="text-white" style="font-weight: 600">Create Todo</h3>
      @csrf
      <fieldset>
          <label for="">Title</label>
          <input placeholder="Title of todo" type="text" name="title">
      </fieldset>
      <fieldset>
          <label for="">Target Date</label>
          <input placeholder="Target Date" type="date" name="date">
      </fieldset>
      <fieldset>
          <label for="">Description</label>
          <textarea placeholder="Type your descriptions here..." tabindex="5" name="description"></textarea>
      </fieldset>
      <fieldset>
          <button type="submit" id="contactus-submit">Submit</button>
      </fieldset>
      <fieldset>
          <a href="/todo" class="btn-cancel btn-lg btn">Cancel</a>
      </fieldset>
    
    </form>
  </div>

@endsection