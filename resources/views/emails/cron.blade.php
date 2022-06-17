<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
        @foreach($mailData['users'] as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->interval}}</td>
        </tr>
        @endforeach
     </table>

</body>
</html>
