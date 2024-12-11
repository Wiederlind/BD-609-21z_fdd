<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Details</title>
</head>

<body>
    <h2>Tutor Details</h2>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>User Name</th>
            <th>Subject Name</th>
            <th>Bio</th>
            <th>Price</th>
        </tr>
        <tr>
            <td>{{ $tutor->id }}</td>
            <td>{{ $tutor->user->first_name }} {{ $tutor->user->last_name }}</td>
            <td>{{ $tutor->subject->subject_name }}</td>
            <td>{{ $tutor->bio }}</td>
            <td>{{ $tutor->price }}</td>
        </tr>
    </table>
</body>

</html>