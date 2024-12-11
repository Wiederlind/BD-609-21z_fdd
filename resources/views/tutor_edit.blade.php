<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tutor</title>
</head>

<body>
    <h2>Edit Tutor</h2>
    <form action="{{ route('tutors.update', $tutor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="user_id">User:</label>
            <select id="user_id" name="user_id" required>
                <option value="">Select User</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $tutor->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->first_name }} {{ $user->last_name }}
                </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="subject_id">Subject:</label>
            <select id="subject_id" name="subject_id" required>
                <option value="">Select Subject</option>
                @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ $tutor->subject_id == $subject->id ? 'selected' : '' }}>
                    {{ $subject->subject_name }}
                </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="bio">Bio:</label>
            <textarea id="bio" name="bio" required>{{ $tutor->bio }}</textarea>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="{{ $tutor->price }}" required>
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</body>

</html>