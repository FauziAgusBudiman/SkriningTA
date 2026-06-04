<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Sistem Pakar Skrining Kecanduan Game Online</title>

    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free/css/all.min.css') }}">
    
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 440px;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .logo-wrapper {
            text-align: center;
        }

        .logo-wrapper img {
            max-width: 220px;
            height: auto;
        }

        .login-card {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.04), 0 1px 3px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(226, 232, 240, 0.8);
            padding: 40px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-title {
            font-size: 24px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.5px;
            margin-bottom: 8px;
        }

        .login-subtitle {
            font-size: 14px;
            color: #64748b;
        }

        .alert-premium {
            background-color: #fef2f2;
            border: 1px solid #fee2e2;
            color: #ef4444;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 24px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 16px;
            pointer-events: none;
            transition: color 0.2s ease;
        }

        .form-control-premium {
            width: 100%;
            padding: 12px 16px 12px 46px;
            font-size: 15px;
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            background-color: #ffffff;
            color: #1e293b;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            outline: none;
        }

        .form-control-premium:focus {
            border-color: #0383ef;
            box-shadow: 0 0 0 4px rgba(3, 131, 239, 0.1);
        }

        .form-control-premium:focus + .input-icon {
            color: #0383ef;
        }

        .btn-login-premium {
            background: #0383ef;
            color: #ffffff;
            border: none;
            padding: 14px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 15px rgba(3, 131, 239, 0.2);
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 10px;
        }

        .btn-login-premium:hover {
            background: #026ebd;
            box-shadow: 0 6px 20px rgba(3, 131, 239, 0.3);
            transform: translateY(-1px);
        }

        .back-link-wrapper {
            text-align: center;
            margin-top: 24px;
        }

        .back-link {
            color: #64748b;
            font-size: 14px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s ease;
        }

        .back-link:hover {
            color: #0383ef;
            text-decoration: none;
        }

        @media (max-width: 576px) {
            .login-card {
                padding: 30px 20px;
                border-radius: 20px;
            }
            .login-title {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="logo-wrapper">
            <img src="{{ asset('assets/images/SkriningApp.png') }}" alt="Logo">
        </div>

        <div class="login-card">
            <div class="login-header">
                <h1 class="login-title">Selamat Datang</h1>
                <p class="login-subtitle">Masuk untuk mengakses dasbor admin pakar</p>
            </div>

            @if (session()->has('error'))
                <div class="alert-premium" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="username" value="{{ old('username') }}" class="form-control-premium" required placeholder="Username">
                    <span class="fas fa-user input-icon"></span>
                </div>
                
                <div class="form-group">
                    <input type="password" name="password" required class="form-control-premium" placeholder="Password">
                    <span class="fas fa-lock input-icon"></span>
                </div>

                <button type="submit" name="login" class="btn-login-premium">
                    Masuk <i class="fas fa-sign-in-alt"></i>
                </button>
            </form>

            <div class="back-link-wrapper">
                <a href="{{ route('home') }}" class="back-link">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</body>

</html>
