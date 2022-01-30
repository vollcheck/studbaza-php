@extends('layouts.app')

@section('content')
    <div class="container">
	<div class="row justify-content-center">
            <div class="col-md-10">

		<!-- card for guest -->
		@guest
		<div class="card">
		    <div class="card-body">
			In order to see the content, please
			<a href="{{ route('login') }}">{{ __('log in') }}</a>
			or
			<a href="{{ route('register') }}">{{ __('register') }}</a>.
		    </div>
		</div>
		@endguest

		<!-- additional card for administrator -->
		@if (Auth::user()->is_admin)
		    <div class="card" style="margin-bottom: 20px;">

			<div class="card-header">{{ __('Admin panel') }}</div>
			<div class="card-body">
			    <ul class="nav navbar-nav">
				<li><a href="{{ URL::to('subjects') }}">Subjects</a></li>
				<li><a href="{{ URL::to('users') }}">Users</a></li>
				<li><a href="{{ URL::to('groups') }}">Groups</a></li>
				<li><a href="{{ url('/home') }}">home page</a></li>
				<li><a href="{{ url('/') }}">welcome page</a></li>
			    </ul>
			</div>
		    </div>
		@endif

		<!-- card for standard user -->
		<div class="card">
		    <div class="card-header">{{ __('Your group') }}</div>
		    <div class="card-body">

			@if (session('status'))
			    <div class="alert alert-success" role="alert">
				{{ session('status') }}
			    </div>
			@endif

			See the list of your subjects:
		    </div>
		</div>
	    </div>
	</div>
    </div>
    </div>
@endsection
