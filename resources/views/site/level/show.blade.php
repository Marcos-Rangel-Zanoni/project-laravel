<!DOCTYPE html>
<html>
<head>
    <title>Level Show</title>
</head>
<body>
    <h1>Level: {{ $user->level }}</h1>

    <form method="POST" action="{{ route('level.increase') }}">
        @csrf
        <button type="submit">Increase Level</button>
    </form>
</body>
</html>
