<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Login - {{ config('app.name', 'E-VotePortal') }}</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 400px;
            width: 100%;
        }
        
        .login-header {
            background: linear-gradient(135deg, #2f8cea 0%, #1e6bb8 100%);
            color: white;
            padding: 40px 30px 30px;
            text-align: center;
        }
        
        .voting-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            display: block;
        }
        
        .login-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .login-subtitle {
            opacity: 0.9;
            font-size: 0.95rem;
        }
        
        .login-body {
            padding: 40px 30px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-label {
            color: #495057;
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #2f8cea;
            box-shadow: 0 0 0 0.2rem rgba(47, 140, 234, 0.25);
        }
        
        .btn-login {
            background: linear-gradient(135deg, #2f8cea 0%, #1e6bb8 100%);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 1.1rem;
            width: 100%;
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(47, 140, 234, 0.3);
            color: white;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .remember-me input[type="checkbox"] {
            margin-right: 10px;
            transform: scale(1.2);
        }
        
        .remember-me label {
            color: #6c757d;
            margin-bottom: 0;
            cursor: pointer;
        }
        
        .alert {
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .input-icon {
            position: relative;
        }
        
        .input-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #adb5bd;
            z-index: 2;
        }
        
        .input-icon .form-control {
            padding-left: 45px;
        }
        
        @media (max-width: 576px) {
            .login-card {
                margin: 10px;
            }
            
            .login-header {
                padding: 30px 20px 25px;
            }
            
            .login-body {
                padding: 30px 20px;
            }
            
            .voting-icon {
                font-size: 2.5rem;
            }
            
            .login-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Header with Voting Icon -->
            <div class="login-header">
                <i class="mdi mdi-vote-outline voting-icon"></i>
                <h1 class="login-title">E-VotePortal</h1>
                <p class="login-subtitle">Welcome back! Please sign in to your account</p>
            </div>
            
            <!-- Login Form -->
            <div class="login-body">
                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-icon">
                            <i class="mdi mdi-email"></i>
                            <input id="email" 
                                   type="email" 
                                   name="email" 
                                   class="form-control" 
                                   value="{{ old('email') }}" 
                                   required 
                                   autofocus 
                                   autocomplete="username"
                                   placeholder="Enter your email address">
                        </div>
                    </div>
                    
                    <!-- Password Field -->
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-icon">
                            <i class="mdi mdi-lock"></i>
                            <input id="password" 
                                   type="password" 
                                   name="password" 
                                   class="form-control" 
                                   required 
                                   autocomplete="current-password"
                                   placeholder="Enter your password">
                        </div>
                    </div>
                    
                    <!-- Remember Me -->
                    <div class="remember-me">
                        <input type="checkbox" id="remember_me" name="remember" class="form-check-input">
                        <label for="remember_me" class="form-check-label">Remember me</label>
                    </div>
                    
                    <!-- Login Button -->
                    <button type="submit" class="btn btn-login">
                        <i class="mdi mdi-login me-2"></i>
                        Sign In
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
