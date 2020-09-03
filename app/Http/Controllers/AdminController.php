<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Student::paginate(5);
        return view('home',['data'=>$data]);
    }

    public function registerview()
    {
        return view('auth.register');
    }

    public function postregister(Request $req){

        $this->validate($req, [
            'nrp'=>'required|unique:users,nrp',
            'password'=>'required|min:4',
            'nama'=>'required',
            'photo'=>'required'
        ]);
        // if ($req->file('photos')) {
            $photos=$req->file('photo')->store('photos', 'public');
            // var_dump($photo)
        // }

        User::create([
            'nrp'=>$req->nrp,
            'password'=>bcrypt($req->password),
            'nama'=>$req->nama,
            'photo'=>$photos
        ]);
        return redirect()->back();
    }

    public function logout(){
       \Auth::logout();
        return redirect('/');
    }
    public function newstudent(){
        return view ('Student.new');
    }
}
