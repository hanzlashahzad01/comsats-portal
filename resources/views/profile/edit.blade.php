@extends('layouts.app')

@section('content')
<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <div class="profile-avatar">
                <i class="fas fa-user-circle"></i>
            </div>
            <h2>Edit Profile</h2>
            <p>Update your personal information</p>
        </div>

        <form method="POST" action="{{ route('profile.update') }}" class="profile-form">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">
                    <i class="fas fa-user"></i>
                    Full Name
                </label>
                <input type="text" name="name" id="name" 
                       class="@error('name') error @enderror" 
                       value="{{ old('name', $student->name) }}"
                       placeholder="Enter your full name">
                @error('name')
                    <span class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope"></i>
                    Email Address
                </label>
                <input type="email" name="email" id="email" 
                       class="@error('email') error @enderror" 
                       value="{{ old('email', $student->email) }}"
                       placeholder="Enter your email">
                @error('email')
                    <span class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="department">
                    <i class="fas fa-building"></i>
                    Department
                </label>
                <select name="department" id="department" class="@error('department') error @enderror">
                    <option value="">Select Department</option>
                    <option value="Computer Science" {{ old('department', $student->department) == 'Computer Science' ? 'selected' : '' }}>Computer Science</option>
                    <option value="Electrical Engineering" {{ old('department', $student->department) == 'Electrical Engineering' ? 'selected' : '' }}>Electrical Engineering</option>
                    <option value="Mechanical Engineering" {{ old('department', $student->department) == 'Mechanical Engineering' ? 'selected' : '' }}>Mechanical Engineering</option>
                    <option value="Civil Engineering" {{ old('department', $student->department) == 'Civil Engineering' ? 'selected' : '' }}>Civil Engineering</option>
                    <option value="Business Administration" {{ old('department', $student->department) == 'Business Administration' ? 'selected' : '' }}>Business Administration</option>
                </select>
                @error('department')
                    <span class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('profile.show') }}" class="btn-cancel">
                    <i class="fas fa-times"></i>
                    Cancel
                </a>
                <button type="submit" class="btn-save">
                    <i class="fas fa-save"></i>
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<style>
.profile-container {
    padding: 2rem;
    min-height: calc(100vh - 80px);
    background: var(--gray-light);
}

.profile-card {
    background: var(--white);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    padding: 2.5rem;
    max-width: 600px;
    margin: 0 auto;
}

.profile-header {
    text-align: center;
    margin-bottom: 2.5rem;
}

.profile-avatar {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.profile-avatar i {
    font-size: 3rem;
    color: var(--white);
}

.profile-header h2 {
    color: var(--primary-color);
    font-size: 1.8rem;
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.profile-header p {
    color: var(--gray);
    font-size: 1rem;
}

.profile-form {
    display: grid;
    gap: 1.5rem;
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
    padding: 0.9rem 1rem;
    border: 2px solid var(--gray-light);
    border-radius: 10px;
    font-size: 1rem;
    transition: var(--transition);
}

.form-group input:focus,
.form-group select:focus {
    border-color: var(--accent-color);
    box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.1);
    outline: none;
}

.form-group select {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%237f8c8d' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    padding-right: 2.5rem;
}

.form-actions {
    display: flex;
    gap: 1rem;
    margin-top: 1rem;
}

.btn-cancel,
.btn-save {
    padding: 0.9rem 1.5rem;
    border-radius: 10px;
    font-size: 1rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: var(--transition);
    cursor: pointer;
    text-decoration: none;
}

.btn-cancel {
    background: var(--gray-light);
    color: var(--gray);
    border: none;
}

.btn-save {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: var(--white);
    border: none;
    flex: 1;
}

.btn-cancel:hover {
    background: #e0e0e0;
    transform: translateY(-2px);
}

.btn-save:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.error-message {
    color: var(--error);
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    gap: 0.3rem;
}

.form-group input.error,
.form-group select.error {
    border-color: var(--error);
}

@media (max-width: 768px) {
    .profile-container {
        padding: 1rem;
    }

    .profile-card {
        padding: 2rem;
    }

    .profile-avatar {
        width: 80px;
        height: 80px;
    }

    .profile-avatar i {
        font-size: 2.5rem;
    }

    .form-actions {
        flex-direction: column;
    }

    .btn-cancel,
    .btn-save {
        width: 100%;
    }
}
</style>
@endsection