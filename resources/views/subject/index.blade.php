<!DOCTYPE html>
<html>
<head>
    <title>Studbaza</title>
    <!-- old bootstrap version -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('subjects') }}">Subject Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('subjects') }}">View All Subject</a></li>
        <li><a href="{{ URL::to('subjects/create') }}">Create a Subject</a>
    </ul>
</nav>

<h1>All the subjects</h1>

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
        </tr>
    </thead>
    <tbody>
    @foreach($subjects as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
		{{ Form::open(array('url' => 'subjects/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this subject', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('subjects/' . $value->id) }}">Show this subject</a>

                <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('subjects/' . $value->id . '/edit') }}">Edit this subject</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
