@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2><i class="fas fa-plus-circle"></i> Add New Course</h2>
    
    <form action="{{ route('courses.store') }}" method="POST" class="course-form">
        @csrf
        
        <div class="form-group">
            <label for="title">Course Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required 
                   placeholder="Enter course title">
            @error('title')
                <span class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="code">Course Code</label>
            <input type="text" id="code" name="code" value="{{ old('code') }}" required 
                   placeholder="Enter course code">
            @error('code')
                <span class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="credit_hours">Credit Hours</label>
            <input type="number" id="credit_hours" name="credit_hours" value="{{ old('credit_hours') }}" 
                   required min="1" max="6" placeholder="Enter credit hours">
            @error('credit_hours')
                <span class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="department">Department</label>
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

        <div class="form-group">
            <label for="instructor">Instructor</label>
            <input type="text" id="instructor" name="instructor" value="{{ old('instructor') }}" required 
                   placeholder="Enter instructor name">
            @error('instructor')
                <span class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Course Description</label>
            <textarea id="description" name="description" rows="4" 
                      placeholder="Enter course description">{{ old('description') }}</textarea>
            @error('description')
                <span class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Add Course
            </button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>

<style>
.form-container {
    max-width: 800px;
    margin: 2rem auto;
    background: var(--white);
    padding: 2rem;
    border-radius: 15px;
    box-shadow: var(--shadow);
}

.form-container h2 {
    color: var(--primary-color);
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.course-form {
    display: grid;
    gap: 1.5rem;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.form-group label {
    font-weight: 500;
    color: var(--primary-color);
}

.form-group input,
.form-group select,
.form-group textarea {
    padding: 0.8rem;
    border: 2px solid var(--gray-light);
    border-radius: 8px;
    font-family: inherit;
    font-size: 1rem;
    transition: var(--transition);
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: var(--accent-color);
    outline: none;
    box-shadow: 0 0 0 3px rgba(112, 119, 161, 0.1);
}

.form-group textarea {
    resize: vertical;
    min-height: 100px;
}

.error-message {
    color: var(--error);
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.3rem;
}

.form-actions {
    display: flex;
    gap: 1rem;
    margin-top: 1rem;
}

.btn-primary {
    background: var(--primary-color);
    color: var(--white);
}

.btn-secondary {
    background: var(--gray-light);
    color: var(--primary-color);
}

@media (max-width: 768px) {
    .form-container {
        margin: 1rem;
        padding: 1.5rem;
    }

    .form-actions {
        flex-direction: column;
    }

    .form-actions .btn {
        width: 100%;
    }
}
</style>
@endsection 