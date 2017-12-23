<!DOCTYPE html>
<html>
<head>
	<title>configuration mail</title>
</head>
<body>


<h1>welcome to my dummy site {{ $user->name }}</h1>

<div>
	<p>please follow that link to activte your account: </p>
	<a href="localhost:8000/activate/{{$user->act_key}}">{{ $user->act_key }}</a>
</div>

</body>
</html>