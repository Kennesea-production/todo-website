@extends ('layout.user')

@section('content')

    <div class="container content">     
      <form id="create-form" action="/update/{{ $todo['id'] }}" method="POST">
        @method('PATCH')
`   
      <h3 class="text-white" style="font-weight: 600">Edit Todo</h3>
      @csrf
      <fieldset>
          <label for="">Title</label>
          {{-- attribute value fungsinya unutuk memasukan data ke input --}}
          {{--kenapa datanya harus disimpen di input? karena ini kan fitur edit. Kalau
          fitur edit belum tentu semua data column diubah. Jadi untuk mengantisipasi 
          hal itu, tampilin dulu semua data di inputnya baru nantinya pengguna yang
          menentukan data input mana yang mau diubah --}}
          <input placeholder="title of todo" type="text" name="title" value="{{ $todo['title'] }}">
      </fieldset>
      <fieldset>
          <label for="">Target Date</label>
          <input placeholder="Target Date" type="date" name="date" value="{{ $todo['date'] }}">
      </fieldset>
      <fieldset>
          <label for="">Description</label>
          {{-- karena teks area tidak termaasuk tag input, untuk menampilkan value nya di pertengahan (sebelum penutup tag </teksarea>) --}}
          <textarea name="description" placeholder="Type your descriptions here..." tabindex="5">{{ $todo['description'] }}</textarea>
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