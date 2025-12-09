<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-container {
            padding: 50px 40px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container h2 {
            margin-bottom: 10px;
            font-weight: 700;
            font-size: 32px;
            color: #333;
        }

        .login-subtitle {
            margin-bottom: 30px;
            font-size: 14px;
            color: #999;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-group input,
        .input-group select {
            width: 100%;
            padding: 14px 16px;
            border-radius: 8px;
            border: 2px solid #e0e0e0;
            outline: none;
            font-size: 14px;
            font-family: "Poppins", sans-serif;
            color: #333;
            transition: all 0.3s ease;
        }

        .input-group input:focus,
        .input-group select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .input-group input::placeholder {
            color: #bbb;
        }

        .btn-login {
            margin-top: 25px;
            width: 100%;
            padding: 14px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            color: #fff;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .error {
            background: #fee;
            border-left: 4px solid #f44;
            padding: 12px 15px;
            border-radius: 6px;
            font-size: 13px;
            margin-bottom: 20px;
            color: #c33;
            animation: shake 0.4s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
    </style>

</head>
<body>

<div class="login-wrapper">
    <div class="login-container">
        <h2>LOGIN</h2>
        <p class="login-subtitle">Sign in to your account</p>

        {{-- ERROR MESSAGE --}}
        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        {{-- LOGIN FORM --}}
        <form method="POST" action="{{ route('login.process') }}">
            @csrf

            <div class="input-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="you@example.com" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>

            <div class="input-group">
                <label>User Role</label>
                <select name="role" required>
                    <option value="">-- Select Role --</option>
                    <option value="admin">Admin</option>
                    <option value="instructor">Instructor</option>
                    <option value="student">Student</option>
                </select>
            </div>

            <button class="btn-login" type="submit">Login</button>
        </form>
    </div>
</div>

</body>
</html>
