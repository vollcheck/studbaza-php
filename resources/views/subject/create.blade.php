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

<h1>Create a subject</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'subjects')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Request::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('lecturer', 'Lecturer') }}
        {{ Form::text('lecturer', Request::old('lecturer'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('exam_date', 'Exam Date') }}
        {{ Form::text('exam_date', Request::old('exam_date'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Create the subject!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
