<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Auth System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
:root {
    --login-main: #0d6efd;
    --login-light: #5bbcff;

    --register-main: #198754;
    --register-light: #6fdc9e;
}

body {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--login-main), var(--login-light));
    transition: background .6s ease;
}

/* CARD */
.auth-card {
    width: 420px;
    background: #fff;
    border-radius: 22px;
    box-shadow: 0 30px 70px rgba(0,0,0,.25);
    overflow: hidden;
}

/* HEADER */
.auth-header {
    text-align: center;
    padding: 26px 24px 12px;
}

.auth-header i {
    font-size: 2.5rem;
    transition: color .4s ease;
}

.auth-header h5 {
    margin-top: 6px;
    font-weight: 600;
}

.persona-line {
    width: 46px;
    height: 4px;
    margin: 10px auto 0;
    border-radius: 4px;
    background: var(--login-main);
    transition: background .4s ease;
}

/* FORM */
.forms {
    position: relative;
}

.form-panel {
    display: none;
    padding: 18px 32px 0;
}

.form-panel.active {
    display: block;
    animation: panelIn .4s ease;
}

@keyframes panelIn {
    from {
        opacity: 0;
        transform: translateY(12px);
    }
    to {
        opacity: 1;
        transform: none;
    }
}

/* INPUT GROUP */
.input-group {
    max-width: 320px;
    margin: auto;
}

.input-group-text {
    background: transparent;
    border: none;
    color: #666;
}

.form-control {
    background: #f3f6ff;
    border: none;
    padding: 10px 12px;
}

.form-control:focus {
    background: #fff;
    box-shadow: 0 0 0 2px rgba(13,110,253,.35);
}

/* BUTTON */
.btn-persona {
    margin: 10px auto 0;
    display: block;
    width: 320px;
    border: none;
    font-weight: 600;
    background: linear-gradient(135deg, var(--login-main), var(--login-light));
    transition: .4s ease;
}

.btn-persona:hover {
    transform: translateY(-1px);
}

/* TOGGLE */
.auth-toggle {
    text-align: center;
    padding: 18px;
}

.auth-toggle a {
    font-weight: 600;
    text-decoration: none;
    color: var(--login-main);
    transition: color .4s ease;
}
</style>
</head>
<body>

<div class="auth-card">

    <!-- HEADER -->
    <div class="auth-header">
        <i id="headerIcon" class="bi bi-shield-lock text-primary"></i>
        <h5 id="titleText">Login</h5>
        <div class="persona-line" id="personaLine"></div>
    </div>

    <!-- ERROR -->
    @if ($errors->any())
        <div class="alert alert-danger text-center mx-4 py-2">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- FORMS -->
    <div class="forms">

        <!-- LOGIN -->
        <form id="loginForm"
              class="form-panel {{ !$errors->any() ? 'active' : '' }}"
              method="POST"
              action="{{ route('login.process') }}">
            @csrf

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>

            <div class="input-group mb-4">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>

            <button class="btn btn-persona py-2">LOGIN</button>
        </form>

        <!-- REGISTER -->
        <form id="registerForm"
              class="form-panel {{ $errors->any() ? 'active' : '' }}"
              method="POST"
              action="{{ route('register.process') }}">
            @csrf

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>

            <div class="input-group mb-4">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Password" required>
            </div>

            <button class="btn btn-persona py-2">REGISTER</button>
        </form>

    </div>

    <!-- TOGGLE -->
    <div class="auth-toggle">
        <a href="#" id="toggleBtn">
            {{ $errors->any() ? 'Sudah punya akun? Login' : 'Belum punya akun? Register' }}
        </a>
    </div>

</div>

<script>
const body = document.body;
const loginForm = document.getElementById('loginForm');
const registerForm = document.getElementById('registerForm');
const toggle = document.getElementById('toggleBtn');
const title = document.getElementById('titleText');
const icon = document.getElementById('headerIcon');
const line = document.getElementById('personaLine');

toggle.addEventListener('click', e => {
    e.preventDefault();

    const isLogin = loginForm.classList.contains('active');

    loginForm.classList.toggle('active');
    registerForm.classList.toggle('active');

    if (isLogin) {
        body.style.background = 'linear-gradient(135deg, var(--register-main), var(--register-light))';
        title.textContent = 'Register';
        toggle.textContent = 'Sudah punya akun? Login';
        icon.className = 'bi bi-person-plus text-success';
        line.style.background = 'var(--register-main)';
    } else {
        body.style.background = 'linear-gradient(135deg, var(--login-main), var(--login-light))';
        title.textContent = 'Login';
        toggle.textContent = 'Belum punya akun? Register';
        icon.className = 'bi bi-shield-lock text-primary';
        line.style.background = 'var(--login-main)';
    }
});
</script>

</body>
</html>
