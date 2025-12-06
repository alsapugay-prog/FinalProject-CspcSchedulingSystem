<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: linear-gradient(135deg, #00e5ff, #0044ff);
    }

    .login-container {
        width: 380px;
        padding: 40px;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(18px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        text-align: center;
        color: #fff;
    }

    .login-container h2 {
        margin-bottom: 30px;
        font-weight: 600;
        font-size: 28px;
    }

    .input-group {
        margin-bottom: 20px;
        text-align: left;
    }

    .input-group label {
        font-size: 14px;
        margin-bottom: 5px;
        display: block;
    }

    .input-group input {
        width: 100%;
        padding: 12px 15px;
        border-radius: 10px;
        border: none;
        outline: none;
        font-size: 15px;
        background: rgba(255, 255, 255, 0.25);
        color: #fff;
    }

    .input-group input::placeholder {
        color: #d7d7d7;
    }

    .btn-login {
        margin-top: 10px;
        width: 100%;
        padding: 12px 0;
        background: #00ffc8;
        border: none;
        border-radius: 10px;
        font-size: 17px;
        font-weight: bold;
        cursor: pointer;
        color: #000;
        transition: 0.3s;
    }

    .btn-login:hover {
        background: #00e6b4;
        transform: scale(1.03);
    }

    .error {
        background: rgba(255, 0, 0, 0.25);
        padding: 10px;
        border-radius: 10px;
        font-size: 14px;
        margin-bottom: 15px;
        color: #ffbfbf;
    }
</style>

</head>
<body>

<div class="login-container">
    <h2>Admin Login</h2>

    @if($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.process') }}">
        @csrf

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>
        </div>

        <button class="btn-login" type="submit">Login</button>
    </form>
</div>

</body>
</html>
