<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects List</title>
</head>

<body>
    <h2>Subjects List</h2>
    @foreach($subjects as $subject)
    <h3>{{ $subject->subject_name }}</h3>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>User Name</th>
            <th>Bio</th>
            <th>Price</th>
        </tr>
        @foreach($subject->tutors as $tutor)
        <tr>
            <td>{{ $tutor->id }}</td>
            <td>{{ $tutor->user->first_name }} {{ $tutor->user->last_name }}</td>
            <td>{{ $tutor->bio }}</td>
            <td>{{ $tutor->price }}</td>
        </tr>
        @endforeach
    </table>
    @endforeach
</body>

</html>