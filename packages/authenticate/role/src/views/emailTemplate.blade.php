<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
</head>
<body>
<div>
    <h1> hello {{$name}}</h1>
    <p> User password is {{$password}}</p>
    <p> your reset password link </p>
    <a href="{{$link}}">click here</a>
</div>
</body>
</html>
