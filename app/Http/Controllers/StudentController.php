<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $this->validate($req, [
            'nis'=>'required|unique:students,nis',
            'nama'=>'required',
            'alamat'=>'required',
            'jurusan'=>'required',
            'kelas'=>'required',
            'photo'=>'required',
        ]);
        // if ($req->file('photos')) {
            $photos=$req->file('photo')->store('photos', 'public');
            // var_dump($photo)
        // }

        Student::create([
            'nama'=>$req->nama,
            'nis'=>$req->nis,
            'alamat'=>$req->alamat,
            'kelas'=>$req->kelas,
            'jurusan'=>$req->jurusan,
            'photo'=>$photos
        ]);
        return redirect('home')->with('status','Data berhasil Ditambahkan');   
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Student $student)
    {
        
        if ($req->file('photo')) {
            $photos=$req->file('photo')->store('photos', 'public');
            Student::where('id',$student->id)
                ->update([
                    'nis'=>$req->nis,
                    'nama'=>$req->nama,
                    'photo'=>$photos,
                    'alamat'=>$req->alamat,
                    'kelas'=>$req->kelas,
                    'jurusan'=>$req->jurusan
                ]);
                unlink('storage/'.$student->photo);
        }else{
            Student::where('id',$student->id)
                ->update([
                    'nis'=>$req->nis,
                    'nama'=>$req->nama,
                    // 'photo'=>$photos,
                    'alamat'=>$req->alamat,
                    'kelas'=>$req->kelas,
                    'jurusan'=>$req->jurusan
                ]);
        }
        
        return redirect('home')->with('status', 'Data Berhasil DiUbah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('home')->with('status', 'Data Telah Dihapus !!');
    }
}
