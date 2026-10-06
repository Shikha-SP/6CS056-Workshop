<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
</head>
<body>

<h1>Edit Course</h1>

@if($errors->any())
<div>
    <h3>Please fix the following errors:</h3>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="/courses/{{ $course->id }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name', $course->name) }}">
    </div>

    <div>
        <label>Description:</label>
        <textarea name="description">{{ old('description', $course->description) }}</textarea>
    </div>

    <div>
        <label>Duration (weeks):</label>
        <input type="number" name="duration" value="{{ old('duration', $course->duration) }}">
    </div>

    <div>
        <label>Fee:</label>
        <input type="number" step="0.01" name="fee" value="{{ old('fee', $course->fee) }}">
    </div>

    <div>
        <label>Difficulty:</label>
        <select name="difficulty">
            <option value="Easy" {{ old('difficulty', $course->difficulty) == 'Easy' ? 'selected' : '' }}>Easy</option>
            <option value="Medium" {{ old('difficulty', $course->difficulty) == 'Medium' ? 'selected' : '' }}>Medium</option>
            <option value="Hard" {{ old('difficulty', $course->difficulty) == 'Hard' ? 'selected' : '' }}>Hard</option>
        </select>
    </div>

    <div>
        <label>
            <input type="checkbox" name="is_active" value="1"
                {{ old('is_active', $course->is_active) ? 'checked' : '' }}>
            Active
        </label>
    </div>

    <button type="submit">Update Course</button>
</form>

<a href="/courses">Back to Courses</a>

</body>
</html>
