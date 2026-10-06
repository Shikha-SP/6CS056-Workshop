<!DOCTYPE html>
<html>
<head>
    <title>Create Course</title>
</head>
<body>

<h1>Create Course</h1>

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

<form action="/course" method="POST">
    @csrf

    <div>
        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
        <label>Description:</label>
        <textarea name="description">{{ old('description') }}</textarea>
    </div>

    <div>
        <label>Duration (weeks):</label>
        <input type="number" name="duration" value="{{ old('duration') }}">
    </div>

    <div>
        <label>Fee:</label>
        <input type="number" step="0.01" name="fee" value="{{ old('fee') }}">
    </div>

    <div>
        <label>Difficulty:</label>
        <select name="difficulty">
            <option value="">Select difficulty</option>
            <option value="Easy" {{ old('difficulty') == 'Easy' ? 'selected' : '' }}>Easy</option>
            <option value="Medium" {{ old('difficulty') == 'Medium' ? 'selected' : '' }}>Medium</option>
            <option value="Hard" {{ old('difficulty') == 'Hard' ? 'selected' : '' }}>Hard</option>
        </select>
    </div>

    <div>
        <label>
            <input type="checkbox" name="is_active" value="1"
                {{ old('is_active', true) ? 'checked' : '' }}>
            Active
        </label>
    </div>

    <button type="submit">Create Course</button>
</form>

<a href="/courses">Back to Courses</a>

</body>
</html>
