<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
</head>

<body>
    <h2>User Details</h2>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Is Tutor</th>
            <th>Is Admin</th>
            <th>Is Active</th>
        </tr>
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->is_tutor ? 'Yes' : 'No' }}</td>
            <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td>
            <td>{{ $user->is_active ? 'Yes' : 'No' }}</td>
        </tr>
    </table>
</body>

</html>