<!DOCTYPE html>
<html>
<head>
    <title>Studbaza</title>
    <!-- TODO: old bootstrap version -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('groups') }}">Group Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('groups') }}">View All Group</a></li>
        <li><a href="{{ URL::to('groups/create') }}">Create a Group</a>
    </ul>
</nav>

<h1>All the groups</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Lecturer</td>
            <td>Exam Ddate</td>
	    <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($groups as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->lecturer }}</td>
	    <td>{{ $value->exam_date }}</td> <!-- TODO: formatting here -->

            <td>
		{{ Form::open(array('url' => 'groups/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this group', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
                <a class="btn btn-small btn-success" href="{{ URL::to('groups/' . $value->id) }}">Show</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('groups/' . $value->id . '/edit') }}">Edit</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
