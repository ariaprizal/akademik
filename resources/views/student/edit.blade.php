@extends('layouts.main')

@section('title','Update Data Siswa')
@section('content')

{{--  formupdate --}}

    <h2 class="text-center mb-5 mt-5">Update Data Siswa</h2>
    <div class="row justify-content-center ">
    <div class="col-md-6 ">
        <form method="post" action="{{ route('student.update',$student->id) }}" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
          <div class="form-group ">
            {{-- <label for="formGroupExampleInput">Masukan NIS</label> --}}
            <input type="text" class="form-control" id="nis" placeholder=" Masukan NIS" name="nis" value="{{ $student->nis }}">
          </div>
          <div class="form-group">
            {{-- <label for="formGroupExampleInput2">Masuka Nama</label> --}}
            <input type="text" class="form-control" id="nama" placeholder="Masukan Nama" name="nama" value="{{ $student->nama }}">
          </div>
          <div class="form-group">
              {{-- <label for="exampleFormControlSelect1">Example select</label> --}}
              <select class="form-control" id="kelas" name="kelas" >
                <option>{{ $student->kelas }}</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          <div class="form-group">
            {{-- <label for="formGroupExampleInput2">Another label</label> --}}
            <input type="text" class="form-control" id="jurusan" placeholder="Masukan Jurusan" name="jurusan" value="{{ $student->Jurusan }}">
          </div>
          <div class="form-group">
            {{-- <label for="formGroupExampleInput">Example label</label> --}}
            <input type="text" class="form-control" id="alamat" placeholder="Masukan Alamat" name="alamat" value="{{ $student->alamat }}">
          </div>
          <div class="form-group">
              <div class="custom-file">
                  <input type="file" class="custom-file-input" id="photo" name="photo" accept="photo/*">
                  <label class="custom-file-label" for="photo">{{ $student->photo }}</label>
              </div>
          </div>
          <div class="form-group">
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Update Data</button>
              <button type="button" class="btn btn-secondary">Batal</button>
            </div>
          </div>
    </form>
  </div>
  <div class="col-md-4 ml-3 d-flex-center">
    {{--  <div class="preview mt-2">  --}}
    <img class="editimage" id="gambar" src="{{ asset('storage/'.$student->photo)}}" width="300px" src="" class="img-responsive img-thumbnail " alt="Preview Image">
    {{--  </div>  --}}
  </div>
</div>

{{-- endform  --}}

@endsection