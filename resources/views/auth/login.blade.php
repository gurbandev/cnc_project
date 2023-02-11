<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

</head>
<body class="bg-dark">

<div class="container-xl py-3 mt-5 pt-5">
    <div class="row justify-content-center mt-5 pt-5">
        <div class="col-8 col-sm-6 col-md-4 col-lg-3 border rounded-2 bg-white py-5 px-3">
            <div class="h3 text-center mb-3">
                Admin Login
            </div>

            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="username" class="form-label fw-semibold">
                        username
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                           id="username" value="{{ old('username') }}" required autofocus>
                    @error('username')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">
                        password
                        <span class="text-danger">*</span>
                    </label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                           id="password" value="{{ old('password') }}" required>
                    @error('password')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="" id="remember">
                    <label class="form-check-label" for="remember">
                        Yatla meni
                    </label>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Iceri gir
                </button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>


</body>
</html>