<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset\css\style.css') }}">
    <title>@yield('title')</title>
  </head>
  <body class="loginbody">
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ auth::user()->nama ?? '' }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="sidebarMenu" class="nav-link dropdown-toggle" href="#" role="button " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nama }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}
    {{-- </div> --}}

    <nav class="navbar navbar-expand-lg navbar-light  ">
        <a class="navbar-brand mr-4" href="{{ '/' }}">Akademik</a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            <input class="form-control mr-sm-2 w-60 " type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-dark my-2 my-sm-0 mr-3 tombol" type="submit">Search</button>
        <div class="collapse navbar-collapse  justify-content-end" id="sidebarMenu">
            <ul class="navbar-nav ">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="sidebarMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->nama}}
                </a>
                <div class="dropdown-menu" aria-labelledby="sidebarMenu">
                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                </div>
                </li>
            </ul>
        </div>
      </nav>
 
    <div class="container-fluid sidebar">
        <div class="row ">
          <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark side collapse ">
            <div class="text-center textside">
                <h4 class="mt-4">Welcome Back</h4>
                <img src="{{ asset('storage/'.Auth::user()->photo) }}" width="150px" class="rounded-circle mb-2 mt-2" alt="Profiel">
                <h4>{{Auth::user()->nama}}</h4>
            </div>
            <div class="card cardlist mt-5">
            <ul class="list-group list-group-flush   ">
            <li class="list-group-item mt-5"><a href="{{route('home')}}"> Students</a></li>
                <li class="list-group-item"><a href="#"> Teachers</a></li>
                <li class="list-group-item"><a href="#"> Stafs</a></li>
                <li class="list-group-item"><a href="#"> Admin</a></li>
              </ul>
            </div>
          </nav>
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4  test">
             @yield('content')
          </main>
        </div>
    </div>
















































    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function () {
          $(document).on('change', '#photos', function () {
              let photo= $('#photos').val();
              $('.custom-file-label').text(photo)
          });
      });
    </script>
 
{{--  mengisi modal update  --}}
    <script>
        $(document).ready(function(){
        $(document).on('click', '#edit', function(){
              $('#id').val($(this).data('id'));
              $('#nis').val($(this).data('nis'));
              $('#nama').val($(this).data('nama'));
              $('#kelas').val($(this).data('kelas'));
              $('#juru').val($(this).data('jurusan'));
              $('#alamat').val($(this).data('alamat'));
              $('#gambar').val($(this).data('photo'));
              let z= $('.custom-file-label').text($(this).data('photo'));
              let gambar=document.querySelector('.editimage');
              let act=document.querySelector('#idupdate');
              gambar.src=$(this).data('photo');
              act.action=$(this).data('id');

        });
        $(document).on('change', '#photo', function () {
            let photo= $('#photo').val();
            $('.custom-file-label').text(photo)
        });

        });
    </script>
{{--  end modal update  --}}

{{--  mengisi modal delete  --}}
        <script>
            $(document).ready(function(){
                $(document).on('click', '#delete', function(){
                    let nama=$(this).data('nama');
                    $('#datanama').text('Apakah Anda Yakin Ingin Menghapus Data '+nama+'?');
                    let rou=document.querySelector('#iddelete');
                    rou.action=$(this).data('iddel');
                    
                });
            });
        </script>
{{--  end modal delete  --}}

  <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
         var reader = new FileReader();
         
         reader.onload = function (e) {
          $('#gambar').attr('src', e.target.result);
         }
         
         reader.readAsDataURL(input.files[0]);
        }
       }

    $(document).ready(function(){
        $('#photo').change(function(){
          readURL(this);
        });
     
    });
  </script>
  
  </body>
</html>