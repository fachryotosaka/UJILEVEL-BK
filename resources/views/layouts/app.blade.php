<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>{{ $title ?? config('app.name') }}</title>
    <style>
        body {
            background: lightgray;
            font-family: 'Quicksand', sans-serif
        }
    </style>
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  </head>
  <body>

    @auth
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
            </li>
            @if (Auth::user()->role === 'admin')
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index') }}">Admin Table</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('counseling-teacher.index') }}">Counseling Teacher Table</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('classroom-teacher.index') }}">Classroom Teacher Table</a>
              </li>
            @endif

            @if (Auth::user()->role === 'admin')
              <li class="nav-item">
                <a class="nav-link" href="{{ route('student.index') }}">Student Table</a>
              </li>
                <a class="nav-link" href="{{ route('students') }}">History</a>
              </li>
            @elseif(Auth::user()->role === 'teacher')
              <li class="nav-item">
                <a class="nav-link" href="{{ route('students') }}">Student Table</a>
              </li>
              <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link" id="btn-create-schedule">Send Schedule</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('archive-schedule') }}">History</a>
              </li>
            @elseif(Auth::user()->role === 'classroom_teacher')
              <li class="nav-item">
                <a class="nav-link" href="{{ route('students') }}">Student Table</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('archive-schedule') }}">History</a>
              </li>
            @elseif(Auth::user()->role === 'student')
              <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link" id="btn-create-schedule">Request Schedule</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('archive-schedule') }}">History</a>
              </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="{{ route('profile.show') }}">Profile</a>
            </li>
          </ul>

          <select name="search" id="search-bar" style="width: 200px"></select>

        </div>
      </nav>
    @endauth

    <div class="container mt-5">
        <div class="row justify-content-center">
            @yield('content')
        </div>
    </div>
    @if(Auth::user() != null && Auth::user()->role === 'student' || Auth::user() != null && Auth::user()->role === 'teacher')
      @include('components.request-schedule-modal')
    @endif
    @stack('script')


    @include('dashboard.shared.searchJS')

  </body>
</html> 