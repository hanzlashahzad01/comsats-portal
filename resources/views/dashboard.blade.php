@extends('layouts.app')

@section('content')
<div class="dashboard-welcome">
    <div class="welcome-header">
        <div class="welcome-text">
            <h2>Welcome back, {{ Auth::user()->name }}! 👋</h2>
            <p>Here's what's happening with your academic journey today.</p>
        </div>
        <div class="welcome-stats">
            <div class="stat-card">
                <i class="fas fa-book"></i>
                <div class="stat-info">
                    <h3>Enrolled Courses</h3>
                    <p>{{ Auth::user()->courses->count() ?? 0 }}</p>
                </div>
            </div>
            <div class="stat-card">
                <i class="fas fa-calendar-check"></i>
                <div class="stat-info">
                    <h3>Upcoming Events</h3>
                    <p>3</p>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-grid">
        <div class="dashboard-card">
            <h3><i class="fas fa-user"></i> Profile Overview</h3>
            <p>Manage your personal information and academic details.</p>
            <div class="card-actions">
                <a href="{{ route('profile.show') }}" class="btn">
                    <i class="fas fa-eye"></i> View Profile
                </a>
                <a href="{{ route('profile.edit') }}" class="btn">
                    <i class="fas fa-edit"></i> Edit Profile
                </a>
            </div>
        </div>

        <div class="dashboard-card">
            <h3><i class="fas fa-book"></i> Course Management</h3>
            <p>Access and manage your enrolled courses.</p>
            <div class="card-actions">
                <a href="{{ route('courses.index') }}" class="btn">
                    <i class="fas fa-list"></i> View Courses
                </a>
                <a href="{{ route('courses.index') }}" class="btn">
                    <i class="fas fa-plus"></i> Add Course
                </a>
            </div>
        </div>

        <div class="dashboard-card">
            <h3><i class="fas fa-file-export"></i> Export Options</h3>
            <p>Download your profile data in different formats.</p>
            <div class="card-actions">
                <a href="{{ route('profile.export.json') }}" class="btn btn-green">
                    <i class="fas fa-file-code"></i> Export JSON
                </a>
                <a href="{{ route('profile.export.xml') }}" class="btn btn-green">
                    <i class="fas fa-file-code"></i> Export XML
                </a>
            </div>
        </div>

        <div class="dashboard-card">
            <h3><i class="fas fa-bell"></i> Quick Notifications</h3>
            <div class="notification-list">
                <div class="notification-item">
                    <i class="fas fa-info-circle"></i>
                    <p>Course registration deadline: 2 days left</p>
                </div>
                <div class="notification-item">
                    <i class="fas fa-exclamation-circle"></i>
                    <p>New course material available</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.welcome-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
}

.welcome-stats {
    display: flex;
    gap: 1rem;
}

.stat-card {
    background: var(--secondary-color);
    color: var(--white);
    padding: 1rem;
    border-radius: 10px;
    display: flex;
    align-items: center;
    gap: 1rem;
    min-width: 200px;
}

.stat-card i {
    font-size: 2rem;
}

.stat-info h3 {
    font-size: 0.9rem;
    margin-bottom: 0.2rem;
}

.stat-info p {
    font-size: 1.5rem;
    font-weight: 600;
}

.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
    margin-top: 2rem;
}

.dashboard-card {
    background: var(--white);
    padding: 1.5rem;
    border-radius: 15px;
    box-shadow: var(--shadow);
    transition: var(--transition);
}

.dashboard-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
}

.dashboard-card h3 {
    color: var(--primary-color);
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.card-actions {
    display: flex;
    gap: 1rem;
    margin-top: 1rem;
}

.notification-list {
    margin-top: 1rem;
}

.notification-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 0;
    border-bottom: 1px solid #eee;
}

.notification-item:last-child {
    border-bottom: none;
}

.notification-item i {
    color: var(--accent-color);
}

@media (max-width: 768px) {
    .welcome-header {
        flex-direction: column;
        gap: 1rem;
    }

    .welcome-stats {
        width: 100%;
        justify-content: space-between;
    }

    .stat-card {
        flex: 1;
    }
}
</style>
@endsection