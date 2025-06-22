<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSS -->
    <link href="{{ asset('css/css-backend/login.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
        <div class="container">
            <div class="row w-100 rounded-4 mx-auto overflow-hidden shadow" style="max-width: 2000px; min-height: 80vh;">
                <!-- Kolom Gambar -->
                <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center bg-info p-0">
                    <img alt="Gambar Login" class="img-fluid object-fit-cover" src="{{ asset('images/orang-senang3.png') }}">
                </div>

                <!-- Kolom Form Login -->
                <div class="col-12 col-md-6 d-flex align-items-center justify-content-center bg-white p-5">
                    <div class="w-100" style="max-width: 500px;">

                        <!-- Logo -->
                        <div class="d-flex justify-content-center my-4 flex-wrap gap-3">
                            <img src="{{ asset('images/logo1.png') }}" style="width: 60px; height: 60px; object-fit: contain;">
                            <img src="{{ asset('images/logo2.png') }}" style="width: 60px; height: 60px; object-fit: contain;">
                            <img src="{{ asset('images/logo-smpit.png') }}" style="width: 60px; height: 60px; object-fit: contain;">
                            <img src="{{ asset('images/logo-komet.png') }}" style="width: 60px; height: 60px; object-fit: contain;">
                        </div>

                        <div class="header-login">
                            <h2 class="text-center">SMPIT Bina Insani Kota Metro</h2>
                            <p class="fst-italic text-center">"Sekolahnya Para Juara Pemburu Sukes Dunia akhirat"</p>
                        </div>
                        <div class="rounded-3 border p-3">

                            @if ($errors->has('login'))
                                <div class="alert alert-danger">{{ $errors->first('login') }}</div>
                            @endif

                            <form action="{{ route('login.submit') }}" class="d-grid my-3 gap-3" method="POST">
                                @csrf
                                <input class="form-control" name="email" placeholder="Email" required type="email" value="{{ old('email') }}">
                                <input class="form-control" name="password" placeholder="Password" required type="password">
                                <button class="btn btn-info fw-bold w-100 text-white" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
