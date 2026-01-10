@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <i class="fas fa-user-plus"></i>
            <h2>Create Account</h2>
            <p>Join our student community today</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="auth-form">
            @csrf
            
            <div class="form-row">
                <div class="form-group">
                    <label for="name">
                        <i class="fas fa-user"></i>
                        Full Name
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required 
                           placeholder="Enter your full name">
                    @error('name')
                        <span class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="student_id">
                        <i class="fas fa-id-card"></i>
                        Student ID
                    </label>
                    <input type="text" id="student_id" name="student_id" value="{{ old('student_id') }}" required 
                           placeholder="Enter your student ID">
                    @error('student_id')
                        <span class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope"></i>
                    Email Address
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required 
                       placeholder="Enter your email">
                @error('email')
                    <span class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-lock"></i>
                        Password
                    </label>
                    <div class="password-input">
                        <input type="password" id="password" name="password" required 
                               placeholder="Create password">
                        <button type="button" class="toggle-password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <span class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">
                        <i class="fas fa-lock"></i>
                        Confirm Password
                    </label>
                    <div class="password-input">
                        <input type="password" id="password_confirmation" name="password_confirmation" required 
                               placeholder="Confirm password">
                        <button type="button" class="toggle-password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="department">
                    <i class="fas fa-building"></i>
                    Department
                </label>
                <select id="department" name="department" required>
                    <option value="">Select Department</option>
                    <option value="Computer Science" {{ old('department') == 'Computer Science' ? 'selected' : '' }}>Computer Science</option>
                    <option value="Electrical Engineering" {{ old('department') == 'Electrical Engineering' ? 'selected' : '' }}>Electrical Engineering</option>
                    <option value="Mechanical Engineering" {{ old('department') == 'Mechanical Engineering' ? 'selected' : '' }}>Mechanical Engineering</option>
                    <option value="Civil Engineering" {{ old('department') == 'Civil Engineering' ? 'selected' : '' }}>Civil Engineering</option>
                    <option value="Business Administration" {{ old('department') == 'Business Administration' ? 'selected' : '' }}>Business Administration</option>
                </select>
                @error('department')
                    <span class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                @enderror
            </div>

            <div class="terms-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="terms" required>
                    <span>I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></span>
                </label>
            </div>

            <button type="submit" class="btn-auth">
                <i class="fas fa-user-plus"></i>
                Create Account
            </button>
        </form>

        <div class="auth-footer">
            <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
        </div>
    </div>
</div>

<style>
.auth-container {
    min-height: calc(100vh - 80px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
}

.auth-card {
    background: var(--white);
    padding: 2.5rem;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 600px;
    animation: slideUp 0.5s ease;
}

.auth-header {
    text-align: center;
    margin-bottom: 2rem;
}

.auth-header i {
    font-size: 3rem;
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.auth-header h2 {
    color: var(--primary-color);
    font-size: 1.8rem;
    margin-bottom: 0.5rem;
}

.auth-header p {
    color: var(--gray);
    font-size: 1rem;
}

.auth-form {
    display: grid;
    gap: 1.5rem;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
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
}

.form-group label i {
    color: var(--accent-color);
}

.form-group input,
.form-group select {
    padding: 0.8rem 1rem;
    border: 2px solid var(--gray-light);
    border-radius: 10px;
    font-size: 1rem;
    transition: var(--transition);
}

.form-group input:focus,
.form-group select:focus {
    border-color: var(--accent-color);
    box-shadow: 0 0 0 3px rgba(112, 119, 161, 0.1);
    outline: none;
}

.password-input {
    position: relative;
}

.toggle-password {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: var(--gray);
    cursor: pointer;
    padding: 0;
    transition: var(--transition);
}

.toggle-password:hover {
    color: var(--accent-color);
}

.terms-group {
    margin-top: 0.5rem;
}

.checkbox-label {
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
    color: var(--gray);
    font-size: 0.9rem;
}

.checkbox-label input[type="checkbox"] {
    width: 16px;
    height: 16px;
    margin-top: 0.2rem;
    accent-color: var(--accent-color);
}

.checkbox-label a {
    color: var(--accent-color);
    text-decoration: none;
    transition: var(--transition);
}

.checkbox-label a:hover {
    color: var(--primary-color);
    text-decoration: underline;
}

.btn-auth {
    background: var(--primary-color);
    color: var(--white);
    padding: 1rem;
    border: none;
    border-radius: 10px;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: var(--transition);
}

.btn-auth:hover {
    background: var(--secondary-color);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.auth-footer {
    text-align: center;
    margin-top: 2rem;
    color: var(--gray);
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
    gap: 0.3rem;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 768px) {
    .auth-container {
        padding: 1rem;
    }

    .auth-card {
        padding: 2rem;
    }

    .form-row {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
document.querySelectorAll('.toggle-password').forEach(button => {
    button.addEventListener('click', function() {
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
});
</script>
@endsection