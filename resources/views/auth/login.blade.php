<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan | Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    @vite(['resources/views/app.blade', 'resources/views/login.blade', 'css/style.css'])
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            @method('POST')
                            <h4 class="fw-bold mb-5 text-center mt-3">Login Perpustakaan</h4>
                            <div class="d-flex flex-column gap-3 mb-3">
                                <label class="form-label" for="email"><i class="fa-solid fa-envelope me-2"></i>Email</label>
                                <input type="email" name="email" required autofocus="email" class="form-inputs"></input>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <label class="form-label" for="password"><i class="fa-solid fa-key me-2"></i>Password</label>
                                <input type="password" name="password" required class="form-inputs"></input>
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="button btn-purple w-100 mt-3">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
</html>
