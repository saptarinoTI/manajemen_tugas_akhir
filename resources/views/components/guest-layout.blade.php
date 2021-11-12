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
  <x-app._header />

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

    .btn-login {
      font-size: 0.9rem;
      letter-spacing: 0.05rem;
      padding: 0.75rem 1rem;
    }

  </style>
</head>

<body>

  {{-- <div class="container"> --}}
  {{ $slot }}
  {{-- </div> --}}

  @include('sweetalert::alert')

  <x-app._footer />
  @stack('script')



  {{-- Bootstrap Js --}}
  <script src="{{ url('/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
