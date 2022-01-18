<!DOCTYPE html>
<html>
<head>
    <title>Subject App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('subjects') }}">subject Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('subjects') }}">View All subjects</a></li>
        <li><a href="{{ URL::to('subjects/create') }}">Create a subject</a>
    </ul>
</nav>

<h1>Showing {{ $subject->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $subject->name }}</h2>
        <p>
            <strong>Lecturer:</strong> {{ $subject->lecturer }}<br>
            <strong>Exam date:</strong> {{ $subject->exam_date }}
        </p>
    </div>

</div>
</body>
</html>
