<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1e90ff, #3aa0ff);
        }
    </style>
</head>
<body>

<div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="card shadow border-0" style="width: 400px;">
        <div class="card-body p-4">

            <h5 class="text-center mb-3">
                <i class="bi bi-person-plus fs-3 text-primary"></i><br>
                Registrasi Sistem
            </h5>

            <form method="POST" action="{{ route('register.process') }}">
                @csrf

                <div class="mb-2">
                    <input type="text" name="name" class="form-control" placeholder="Nama" required>
                </div>

                <div class="mb-2">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>

                <div class="mb-2">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi Password" required>
                </div>

                <button class="btn btn-primary w-100">
                    Daftar
                </button>
            </form>

        </div>
    </div>
</div>

</body>
</html>
