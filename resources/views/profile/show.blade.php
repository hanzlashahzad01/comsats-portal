@extends('layouts.app')

@section('content')
<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <div class="profile-avatar">
                <i class="fas fa-user-circle"></i>
            </div>
            <h2>Student Profile</h2>
            <p>View and manage your profile information</p>
        </div>

        <div class="profile-info">
            <div class="info-group">
                <div class="info-item">
                    <i class="fas fa-user"></i>
                    <div class="info-content">
                        <label>Full Name</label>
                        <p>{{ $student->name }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <div class="info-content">
                        <label>Email Address</label>
                        <p>{{ $student->email }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-building"></i>
                    <div class="info-content">
                        <label>Department</label>
                        <p>{{ $student->department }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="courses-section">
            <div class="section-header">
                <i class="fas fa-book-open"></i>
                <h3>Registered Courses</h3>
            </div>

            @if($student->courses->count() > 0)
                <div class="courses-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Course Title</th>
                                <th>Credit Hours</th>
                                <th>Instructor</th>
                                <th>Department</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student->courses as $course)
                                <tr>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ $course->credit_hours }}</td>
                                    <td>{{ $course->instructor }}</td>
                                    <td>{{ $course->department }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('courses.unregister') }}" class="unregister-form">
                                            @csrf
                                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                                            <button type="submit" class="btn-unregister" onclick="return confirm('Are you sure you want to unregister from this course?')">
                                                <i class="fas fa-times"></i>
                                                Unregister
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="no-courses">
                    <i class="fas fa-book"></i>
                    <p>You haven't registered for any courses yet.</p>
                </div>
            @endif
        </div>

        @if(session('message'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('message') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        <div class="profile-actions">
            <a href="{{ route('profile.edit') }}" class="btn-edit">
                <i class="fas fa-edit"></i>
                Edit Profile
            </a>
            <div class="export-buttons">
                <a href="{{ route('profile.export.json') }}" class="btn-export">
                    <i class="fas fa-file-export"></i>
                    Export JSON
                </a>
                <a href="{{ route('profile.export.xml') }}" class="btn-export">
                    <i class="fas fa-file-export"></i>
                    Export XML
                </a>
            </div>
        </div>
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
    max-width: 1000px;
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

.profile-info {
    background: var(--gray-light);
    border-radius: 15px;
    padding: 1.5rem;
    margin-bottom: 2rem;
}

.info-group {
    display: grid;
    gap: 1.5rem;
}

.info-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
}

.info-item i {
    font-size: 1.5rem;
    color: var(--accent-color);
    margin-top: 0.25rem;
}

.info-content label {
    display: block;
    color: var(--gray);
    font-size: 0.9rem;
    margin-bottom: 0.25rem;
}

.info-content p {
    color: var(--primary-color);
    font-size: 1.1rem;
    font-weight: 500;
}

.courses-section {
    margin-bottom: 2rem;
}

.section-header {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1.5rem;
}

.section-header i {
    font-size: 1.5rem;
    color: var(--accent-color);
}

.section-header h3 {
    color: var(--primary-color);
    font-size: 1.4rem;
    font-weight: 600;
}

.courses-table {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: var(--white);
    border-radius: 10px;
    overflow: hidden;
}

thead {
    background: var(--primary-color);
    color: var(--white);
}

th {
    padding: 1rem;
    text-align: left;
    font-weight: 500;
    font-size: 0.95rem;
}

td {
    padding: 1rem;
    border-bottom: 1px solid var(--gray-light);
    color: var(--primary-color);
}

tbody tr:last-child td {
    border-bottom: none;
}

.btn-unregister {
    background: var(--error);
    color: var(--white);
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 5px;
    font-size: 0.9rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: var(--transition);
}

.btn-unregister:hover {
    background: #c0392b;
    transform: translateY(-2px);
}

.no-courses {
    text-align: center;
    padding: 3rem;
    background: var(--gray-light);
    border-radius: 10px;
    color: var(--gray);
}

.no-courses i {
    font-size: 3rem;
    margin-bottom: 1rem;
    color: var(--primary-color);
}

.alert {
    padding: 1rem;
    border-radius: 10px;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-danger {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.profile-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
    margin-top: 2rem;
}

.btn-edit,
.btn-export {
    padding: 0.9rem 1.5rem;
    border-radius: 10px;
    font-size: 1rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: var(--transition);
    cursor: pointer;
    text-decoration: none;
}

.btn-edit {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: var(--white);
}

.export-buttons {
    display: flex;
    gap: 1rem;
}

.btn-export {
    background: var(--success);
    color: var(--white);
}

.btn-edit:hover,
.btn-export:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

@media (max-width: 768px) {
    .profile-container {
        padding: 1rem;
    }

    .profile-card {
        padding: 1.5rem;
    }

    .profile-avatar {
        width: 80px;
        height: 80px;
    }

    .profile-avatar i {
        font-size: 2.5rem;
    }

    .info-group {
        grid-template-columns: 1fr;
    }

    .profile-actions {
        flex-direction: column;
    }

    .export-buttons {
        width: 100%;
        flex-direction: column;
    }

    .btn-edit,
    .btn-export {
        width: 100%;
        justify-content: center;
    }

    table {
        font-size: 0.9rem;
    }

    th, td {
        padding: 0.75rem;
    }
}
</style>
@endsection