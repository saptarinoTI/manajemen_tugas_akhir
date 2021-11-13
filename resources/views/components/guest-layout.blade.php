<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- Google Fonts --}}
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap" rel="stylesheet">
  {{-- Bootstrap CSS --}}
  <link rel="stylesheet" href="{{ url('/vendors/bootstrap/css/bootstrap.min.css') }}">

  {{-- Judul Website --}}
  <title>{{ $title }}</title>
  <link rel="stylesheet" href="{{ url('/css/auth.css') }}">
  <link rel="shortcut icon" href="{{ url('img/logo/logo-color.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fixedHeader.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">


  <style>
    .login {
      min-height: 100vh;
    }

    .bg-image {
      background-image: url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=628&q=80');
      background-size: cover;
      background-position: center;
    }

    .login-heading {
      font-weight: 300;
    }

    a {
      text-decoration: none;
      color: #0074D9;
    }

    .underline {
      position: relative;
    }

    .underline::before {
      content: '';
      position: absolute;
      bottom: 0;
      right: 0;
      width: 0;
      height: 2px;
      background-color: #0074D9;
      transition: width 0.6s cubic-bezier(0.25, 1, 0.5, 1);
    }

    @media (hover: hover) and (pointer: fine) {
      .underline:hover::before {
        left: 0;
        right: auto;
        width: 100%;
      }
    }

  </style>
</head>

<body style="background-color: #f5f5f5">

  {{ $slot }}

  @include('sweetalert::alert')

  <x-app._footer />
  @stack('script')



  {{-- Bootstrap Js --}}
  <script src="{{ url('/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
