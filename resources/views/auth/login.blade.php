@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <div class="logo-container">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <h2>Welcome Back!</h2>
            <p>Sign in to continue to your student portal</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf
            
            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope"></i>
                    Email Address
                </label>
                <div class="input-group">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required 
                           placeholder="Enter your email">
                </div>
                @error('email')
                    <span class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">
                    <i class="fas fa-lock"></i>
                    Password
                </label>
                <div class="input-group password-input">
                    <input type="password" id="password" name="password" required 
                           placeholder="Enter your password">
                    <button type="button" class="toggle-password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                @error('password')
                    <span class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                @enderror
            </div>

            <div class="form-options">
                <label class="checkbox-label">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span>Remember me</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-password">
                        Forgot Password?
                    </a>
                @endif
            </div>

            <button type="submit" class="btn-auth">
                <i class="fas fa-sign-in-alt"></i>
                Sign In
            </button>
        </form>

        <div class="auth-footer">
            <p>Don't have an account? <a href="{{ route('register') }}">Register Now</a></p>
        </div>
    </div>
</div>

<style>
:root {
    --primary-color: #1a237e;
    --secondary-color: #0d47a1;
    --accent-color: #2962ff;
    --gray: #546e7a;
    --gray-light: #eceff1;
    --white: #ffffff;
    --error: #d32f2f;
    --success: #2e7d32;
    --transition: all 0.3s ease;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
    color: var(--primary-color);
    background: var(--gray-light);
    overflow-y: auto;
}

.auth-container {
    min-height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    padding: 2rem 1rem;
}

.auth-card {
    background: var(--white);
    padding: 2.5rem;
    border-radius: 24px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 480px;
    animation: slideUp 0.5s ease;
    margin: 2rem 0;
}

.logo-container {
    width: 85px;
    height: 85px;
    background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    transition: var(--transition);
}

.logo-container:hover {
    transform: scale(1.05);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
}

.logo-container i {
    font-size: 2.5rem;
    color: var(--white);
}

.auth-header {
    text-align: center;
    margin-bottom: 2rem;
}

.auth-header h2 {
    color: var(--primary-color);
    font-size: 1.8rem;
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.auth-header p {
    color: var(--gray);
    font-size: 1rem;
}

.auth-form {
    display: grid;
    gap: 1.25rem;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.form-group label {
    color: var(--primary-color);
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 1rem;
}

.form-group label i {
    color: var(--accent-color);
}

.input-group {
    position: relative;
}

.form-group input {
    width: 100%;
    padding: 0.9rem 1.1rem;
    border: 2px solid var(--gray-light);
    border-radius: 12px;
    font-size: 1rem;
    transition: var(--transition);
    background: var(--white);
}

.form-group input:focus {
    border-color: var(--accent-color);
    box-shadow: 0 0 0 4px rgba(41, 98, 255, 0.1);
    outline: none;
}

.form-group input::placeholder {
    color: var(--gray);
    opacity: 0.7;
}

.password-input {
    position: relative;
}

.toggle-password {
    position: absolute;
    right: 1.25rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: var(--gray);
    cursor: pointer;
    padding: 0;
    transition: var(--transition);
    font-size: 1.1rem;
}

.toggle-password:hover {
    color: var(--accent-color);
}

.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.95rem;
    margin: 0.25rem 0;
}

.checkbox-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--gray);
    cursor: pointer;
}

.checkbox-label input[type="checkbox"] {
    width: 18px;
    height: 18px;
    accent-color: var(--accent-color);
    cursor: pointer;
}

.forgot-password {
    color: var(--accent-color);
    text-decoration: none;
    transition: var(--transition);
    font-weight: 500;
}

.forgot-password:hover {
    color: var(--primary-color);
    text-decoration: underline;
}

.btn-auth {
    background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
    color: var(--white);
    padding: 0.9rem;
    border: none;
    border-radius: 12px;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: var(--transition);
    margin-top: 1rem;
    box-shadow: 0 4px 15px rgba(41, 98, 255, 0.2);
}

.btn-auth:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(41, 98, 255, 0.3);
}

.btn-auth:active {
    transform: translateY(0);
}

.auth-footer {
    text-align: center;
    margin-top: 2rem;
    color: var(--gray);
    font-size: 0.95rem;
}

.auth-footer a {
    color: var(--accent-color);
    text-decoration: none;
    font-weight: 500;
    transition: var(--transition);
}

.auth-footer a:hover {
    color: var(--primary-color);
    text-decoration: underline;
}

.error-message {
    color: var(--error);
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.4rem;
    margin-top: 0.25rem;
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

@media (max-width: 768px) {
    .auth-container {
        padding: 1rem;
        align-items: flex-start;
    }

    .auth-card {
        padding: 2rem;
        margin: 1rem 0;
    }

    .logo-container {
        width: 70px;
        height: 70px;
        margin-bottom: 1rem;
    }

    .logo-container i {
        font-size: 2rem;
    }

    .auth-header {
        margin-bottom: 1.5rem;
    }

    .auth-header h2 {
        font-size: 1.6rem;
        margin-bottom: 0.25rem;
    }

    .auth-form {
        gap: 1rem;
    }

    .form-group {
        gap: 0.35rem;
    }

    .form-group input {
        padding: 0.8rem 1rem;
    }

    .btn-auth {
        padding: 0.8rem;
        margin-top: 0.75rem;
    }

    .auth-footer {
        margin-top: 1.5rem;
    }
}

@media (max-height: 700px) {
    .auth-container {
        align-items: flex-start;
    }

    .auth-card {
        margin: 1rem 0;
    }

    .logo-container {
        width: 70px;
        height: 70px;
        margin-bottom: 1rem;
    }

    .logo-container i {
        font-size: 2rem;
    }

    .auth-header {
        margin-bottom: 1.5rem;
    }

    .auth-header h2 {
        font-size: 1.6rem;
        margin-bottom: 0.25rem;
    }

    .auth-form {
        gap: 1rem;
    }

    .form-group {
        gap: 0.35rem;
    }

    .form-group input {
        padding: 0.8rem 1rem;
    }

    .btn-auth {
        padding: 0.8rem;
        margin-top: 0.75rem;
    }

    .auth-footer {
        margin-top: 1.5rem;
    }
}
</style>

<script>
document.querySelector('.toggle-password').addEventListener('click', function() {
    const passwordInput = this.parentElement.querySelector('input');
    const icon = this.querySelector('i');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
});
</script>
@endsection