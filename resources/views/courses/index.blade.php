@extends('layouts.app')

@section('content')
<div class="page-container">
    <div class="page-header">
        <i class="fas fa-book-open"></i>
        <h2>Available Courses</h2>
        <p>Explore and register for courses offered by the university. Use the filters to find specific courses.</p>
    </div>

    <div class="course-filters-and-table">
        <div class="filter-group">
            <div class="input-wrapper">
                <i class="fas fa-building"></i>
                <input type="text" id="departmentFilter" placeholder="Filter by Department">
            </div>
            <div class="input-wrapper">
                <i class="fas fa-chalkboard-teacher"></i>
                <input type="text" id="instructorFilter" placeholder="Filter by Instructor">
            </div>
        </div>

        <div class="table-responsive">
            <table class="courses-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Credit Hours</th>
                        <th>Instructor</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="courseTable">
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->credit_hours }}</td>
                            <td>{{ $course->instructor }}</td>
                            <td>{{ $course->department }}</td>
                            <td>
                                <button class="btn-register" data-id="{{ $course->id }}">
                                    <i class="fas fa-plus-circle"></i> Register
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    @if ($courses->isEmpty())
                        <tr>
                            <td colspan="5" class="no-courses-message">No courses found matching your criteria.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
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
    --border-color: #e0e0e0;
    --hover-bg: #f5f5f5;
    --box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    --transition: all 0.3s ease;
}

.page-container {
    background: var(--white);
    padding: 2.5rem 3rem;
    border-radius: 15px;
    box-shadow: var(--box-shadow);
    margin-top: 2rem;
}

.page-header {
    text-align: center;
    margin-bottom: 2.5rem;
    color: var(--primary-color);
}

.page-header i {
    font-size: 3.5rem;
    color: var(--accent-color);
    margin-bottom: 0.75rem;
}

.page-header h2 {
    font-size: 2.2rem;
    margin-bottom: 0.75rem;
    font-weight: 700;
}

.page-header p {
    font-size: 1.1rem;
    color: var(--gray);
    max-width: 700px;
    margin: 0 auto;
}

.course-filters-and-table {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.filter-group {
    display: flex;
    gap: 1.5rem;
    justify-content: center;
    margin-bottom: 1.5rem;
}

.input-wrapper {
    position: relative;
    flex: 1;
    max-width: 300px;
}

.input-wrapper i {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gray);
    font-size: 0.95rem;
}

.filter-group input {
    width: 100%;
    padding: 0.8rem 1rem 0.8rem 40px;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    font-size: 1rem;
    transition: var(--transition);
    box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
}

.filter-group input:focus {
    border-color: var(--accent-color);
    box-shadow: 0 0 0 3px rgba(41, 98, 255, 0.1), inset 0 1px 3px rgba(0,0,0,0.05);
    outline: none;
}

.table-responsive {
    overflow-x: auto;
}

.courses-table {
    width: 100%;
    border-collapse: collapse;
    background: var(--white);
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.courses-table th,
.courses-table td {
    padding: 1rem 1.25rem;
    text-align: left;
    border-bottom: 1px solid var(--border-color);
}

.courses-table th {
    background-color: var(--primary-color);
    color: var(--white);
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.9rem;
}

.courses-table tbody tr:hover {
    background-color: var(--hover-bg);
    transition: var(--transition);
}

.courses-table tbody tr:last-child td {
    border-bottom: none;
}

.no-courses-message {
    text-align: center;
    padding: 2rem;
    color: var(--gray);
    font-size: 1.1rem;
}

.btn-register {
    background: linear-gradient(135deg, var(--accent-color), var(--secondary-color));
    color: var(--white);
    padding: 0.6rem 1.2rem;
    border: none;
    border-radius: 8px;
    font-size: 0.9rem;
    font-weight: 500;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: var(--transition);
    box-shadow: 0 4px 10px rgba(41, 98, 255, 0.2);
}

.btn-register:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(41, 98, 255, 0.3);
}

.btn-register:active {
    transform: translateY(0);
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-container {
        padding: 1.5rem 1.5rem;
        margin-top: 1rem;
    }

    .page-header {
        margin-bottom: 1.5rem;
    }

    .page-header i {
        font-size: 2.8rem;
    }

    .page-header h2 {
        font-size: 1.8rem;
    }

    .page-header p {
        font-size: 0.95rem;
    }

    .filter-group {
        flex-direction: column;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .input-wrapper {
        max-width: 100%;
    }

    .courses-table th,
    .courses-table td {
        padding: 0.8rem 1rem;
        font-size: 0.9rem;
    }

    .btn-register {
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
    }

    .no-courses-message {
        padding: 1.5rem;
        font-size: 1rem;
    }
}

@media (max-width: 480px) {
    .page-container {
        padding: 1rem 1rem;
    }

    .page-header h2 {
        font-size: 1.6rem;
    }
}
</style>

<script>
$(document).ready(function() {
    $('#departmentFilter, #instructorFilter').on('input', function() {
        $.ajax({
            url: '{{ route('courses.index') }}',
            data: {
                department: $('#departmentFilter').val(),
                instructor: $('#instructorFilter').val()
            },
            success: function(courses) {
                $('#courseTable').empty();
                courses.forEach(course => {
                    $('#courseTable').append(`
                        <tr>
                            <td>${course.title}</td>
                            <td>${course.credit_hours}</td>
                            <td>${course.instructor}</td>
                            <td>${course.department}</td>
                            <td>
                                <button class="btn-register" data-id="${course.id}">
                                    <i class="fas fa-plus-circle"></i> Register
                                </button>
                            </td>
                        </tr>
                    `);
                });
            }
        });
    });

    $(document).on('click', '.btn-register', function() {
        const courseId = $(this).data('id');
        $.ajax({
            url: '{{ route('courses.register') }}',
            method: 'POST',
            data: {
                course_id: courseId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert(response.message);
            },
            error: function(xhr) {
                alert(xhr.responseJSON.message);
            }
        });
    });
});
</script>
@endsection