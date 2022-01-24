@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All the subjects') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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
		       @foreach($subjects as $key => $value)
			   <tr>
			       <td>{{ $value->id }}</td>
			       <td>{{ $value->name }}</td>
			       <td>{{ $value->lecturer }}</td>
			       <td>{{ $value->exam_date }}</td> <!-- TODO: formatting here -->

			       <td>
				   {{ Form::open(array('url' => 'subjects/' . $value->id, 'class' => 'pull-right')) }}
				       {{ Form::hidden('_method', 'DELETE') }}
				       {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
				   {{ Form::close() }}
				   <a class="btn btn-small btn-success" href="{{ URL::to('subjects/' . $value->id) }}">Show</a>
				   <a class="btn btn-small btn-info" href="{{ URL::to('subjects/' . $value->id . '/edit') }}">Edit</a>
			       </td>
			   </tr>
		       @endforeach
		       <tr>
			   <td colspan="5" class="text-center"><a href="{{ URL::to('subjects/create') }}">Create another subject</a></td>
		       </tr>
		       </tbody>
		   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
