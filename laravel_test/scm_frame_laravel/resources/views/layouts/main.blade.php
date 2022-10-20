<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel CRUD</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    @yield('style')
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand ps-5" href="{{route('index')}}">Laravel</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse pe-5" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link me-3 active" aria-current="page" href="{{route('index')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-3" href="{{route('student.index')}}">Students</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-3" href="{{route('major.index')}}">Majors</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-3" href="{{route('api.student.index')}}">Ajax Students</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-3" href="{{route('api.major.index')}}">Ajax Majors</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <div class="container">
        @yield('content')
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    {{-- Jquery CDN--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>
<script>
    $(function($){
        let token = document.head.querySelector('meta[name="csrf-token"]');
        if(token){
            $.ajaxSetup({
                headers : {
                    'X-CSRF-TOKEN' : token.content
                }
            });
        }else{
            console.log('csrf token is not found');
        }
    });
</script>
@yield('script')
</html>
