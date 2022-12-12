<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        //
        return view('guest.register');
    }

    public function home()
    {
        //
        $todos = Todo::all();

        return view('home', compact('todos'));
    }
    
    
    public function index()
    {
        //
        return view('guest.dashboard');
    }

    public function login()
    {
        //
        return view('guest.login');
    }

    public function registerAccount(Request $request)
    {
        //
        $request->validate([
            'email' => 'required|email:dns|unique:users',
            'username' => 'required|min:4|max:8|unique:users',
            'password' => 'required|min:4',
            'name' => 'required|min:3',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/login')->with('success', 'Berhasil menambahkan akun! silahkan login');
    }

    public function auth(Request $request){
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ]);

        $user = $request->only('username', 'password');

        if(Auth::attempt($user)){
            return redirect('/todo')->with('success','berhasil login');
        }else{
            return back()->with('error', 'failed login lol');
        };

    }

    public function todo(){
        $todos = Todo::all();

        return view('user.todo', compact('todos'));
    }

    public function dashboard(){
        return view('dashboard');

    }

    public function logout(){
        Auth::logout();
        return redirect('/');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());

        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:5',
        ]);

        //mengirim data ke database table users dengan model users
        //'' = nama column di table db
        // $request-> = value attribute name pada input
        //kenapa yang dikirim 5 data? karena table pada db todos membutuhkan 6 column input
        //salah satunya column 'done_time' yang tipenya nullable, karna nullable jd ga perlu dikirim nilai
        // 'user_id' untuk memberitahu data todo ini milik siapa, diambil melalui fitur Auth
        // 'status' tipenya boolean, 0 = blm dikerjakan, 1 = sudah dikerjakan (todonya)

        Todo::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'status' => 0,
        ]);

        return redirect('/todo')->with('success', 'Berhasil menambahkan Task!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo, $id)
    {
        //menampilkan halaman input form edit
        //mengambil data satu baris ketika column id pada baris tersebut sama dengan id dari parameter route
        $todo = Todo::where('id', $id)->first();
        //kirim data yang diambil ke file blade dengan compact
        return view('user.edit', compact('todo')); 
    }

    public function updateComplated($id)
    {
        //cara data yang mau diubah statusnya jadi 'complated' dan column 'done_time' yang tadinya null, diisi dengan tanggal  sekarang(tgl)
        Todo::where('id', $id)->update([
            'status'=>1,
            'done_time' =>\Carbon\Carbon::now(),
        ]);
        return redirect()->back()->with('done', 'todo telah selesai dikerjakan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo, $id)
    {
        //
        $request->validate([
            'title'=>'required|min:3',
            'date'=>'required',
            'description'=>'required|min:5',
        ]);
        //cari baris data yang punya id sama dengan data id yang dikirim ke parameter route
        // kalau udah ketemu, update column-column datanya
        Todo::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'user_id' => Auth::user()->id,
            'status' => 0,
        ]);
        // kalau berhasil halaman bakal di redirect ulang ke halaman awal todo dengan pesan pemberitahuan
        return redirect('/todo')->with('success', 'Data todo berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo, $id)
    {
        //
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return redirect('/todo')->with('success', 'Berhasil menghapus');
    }
}
