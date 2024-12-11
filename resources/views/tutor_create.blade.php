<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Tutor</title>
</head>

<body>
    <h2>Create Tutor</h2>
    <form action="{{ route('tutors.store') }}" method="POST">
        @csrf
        <br>

        <label for="user_id">User:</label>
        <select id="user_id" name="user_id" required>
            <option value="">Select User</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
            @endforeach
        </select>

        </br>

        <br>
        <label for="subject_id">Subject:</label>
        <select id="subject_id" name="subject_id" required>
            <option value="">Select Subject</option>
            @foreach($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
            @endforeach
        </select>
        </br>

        <br>
        <label for="bio">Bio:</label>
        <textarea id="bio" name="bio" required></textarea>
        </br>

        <br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required>
        </br>

        <br>
        <button type="submit">Create</button>
        </br>

    </form>

</body>

</html>