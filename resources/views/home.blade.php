@extends('layouts.main')
@section('title','Admin')
@section('content')
{{-- head --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Student Data</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary mr-2" data-toggle="modal" data-target="#tambahsiswa">Tambah Data</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                Class
            </button>
        </div>
    </div>
{{-- ?\endhead --}}

{{-- allert --}}
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
{{-- end allert --}}

{{-- table --}}
  <div id="collapse1" >
  <table class="table table-bordered  table-responsive-xl table-hover ">
      <thead class="table-info">
        <tr>
          <th scope="col">NO</th>
          <th scope="col">NIS</th>
          <th scope="col">Nama</th>
          <th scope="col">Kelas</th>
          <th scope="col">Jurusan</th>
          <th scope="col">Alamat</th>
          <th scope="col">Photo</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody tab>
          @foreach ($data as $d)
          <tr>
          <th scope="row">{{$d->id}}</th>
              <td>{{$d->nis}}</td>
              <td>{{$d->nama}}</td>
              <td>{{$d->kelas}}</td>
              <td>{{$d->Jurusan}}</td>
              <td>{{$d->alamat}}</td>
              <td><img src="{{asset('storage/'.$d->photo)}}" alt="pp" width="100px"></td>
              <td class="text-center">
                <div class="btn-group">
                  <button id="edit" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#updatesiswa"
                      data-id="{{ route('student.update',$d->id) }}"
                      data-nis="{{ $d->nis }}"
                      data-nama="{{ $d->nama }}"
                      data-kelas="{{ $d->kelas }}"
                      data-jurusan="{{ $d->Jurusan }}"
                      data-alamat="{{ $d->alamat }}"
                      data-photo="{{asset('storage/'.$d->photo)}}"
                    >Edit</button> 
                    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#deletesiswa" id="delete"
                    data-iddel="{{ route('student.destroy',$d->id) }}"
                    data-nama="{{ $d->nama }}">
                      Delete
                    </button>
                </div>
              </td>
            </tr>  
          @endforeach
      </tbody>
    </table>
    {{ $data->links() }}
  </div>
{{-- end table --}}


{{-- modal tambah siswa --}}
    <div class="modal fade" id="tambahsiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{-- modal head --}}
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {{-- end head --}}
        {{-- modal body --}}
        <div class="modal-body">
            <form method="post" action="{{route('student.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group ">
                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder=" Masukan NIS" name="nis" value="{{ old('nis') }}">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Nama" name="nama" value="{{ old('nama') }}">
                </div>
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1" name="kelas" >
                      <option>Pilih Kelas</option>
                      <option>X</option>
                      <option>XI</option>
                      <option>XII</option>
                    </select>
                  </div>
                <div class="form-group">
                  <select class="form-control" id="jurusan" name="jurusan" >
                    <option>Teknik Jaringan Komputer</option>
                    <option>Teknik Kendaraan Ringan</option>
                    <option>Teknik Mesin</option>
                    <option>Multimedia</option>
                    <option>Desain Komunikasi Visuak</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Alamat" name="alamat" value="{{ old('alamat') }}">
                </div>
                <div class="form-group">
                      <img class="addimage" id="addgambar" src="" width="300px" class="img-responsive img-thumbnail " alt="Preview Image">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photos" name="photo">
                            <label class="custom-file-label" for="photos">Pilih Photo</label>
                        </div>
                </div>
           </div>
  {{-- end body --}}
  {{-- modal footer --}}
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Simpan Data</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              </div>
            </form>
        {{-- end footer --}}
        </div>
    </div>
  </div>
{{-- end modal tambah siswa --}}



{{-- modal update data siswa --}}
    <div class="modal fade" id="updatesiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      {{-- modal head --}}
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            {{-- end head --}}
            {{-- modal body --}}
            <div class="modal-body">
              <form method="post" id="idupdate" action="" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group ">
                  <input type="text" class="form-control" id="nis" placeholder=" Masukan NIS" name="nis">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="nama" placeholder="Masukan Nama" name="nama" >
                </div>
                <div class="form-group">
                  <select class="form-control" id="juru" name="jurusan" >
                    <option>Teknik Jaringan Komputer</option>
                    <option>Teknik Kendaraan Ringan</option>
                    <option>Teknik Mesin</option>
                    <option>Multimedia</option>
                    <option>Desain Komunikasi Visual</option>
                  </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="kelas" name="kelas" >
                      <option>X</option>
                      <option>XI</option>
                      <option>XII</option>
                    </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="alamat" placeholder="Masukan Alamat" name="alamat" >
                </div>
                <div class="form-group">
                  <img class="editimage" id="gambar" src="" width="300px" src="" class="img-responsive img-thumbnail " alt="Preview Image">
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" name="photo">
                        <label class="custom-file-label" for="photo"></label>
                    </div>
                </div>
                <div class="form-group">
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Data</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
{{-- end modal upadate --}}


{{--  modal delete  --}}
      <div class="modal fade" id="deletesiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body" >
              <h5 id="datanama"></h5>
            </div>
            <div class="modal-footer">
              <form  method="post" action="{{ route('student.destroy', $d->id) }}" id="iddelete">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-primary">Hapus</button>
              </form>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
{{--  end modal delete  --}}



@endsection
