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

<h1>Edit {{ $subject->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($subject, array('route' => array('subjects.update', $subject->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('lecturer', 'Lecturer') }}
        {{ Form::lecturer('lecturer', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('exam_date', 'Exam Date') }}
        {{ Form::exam_date('exam_date', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the subject!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
