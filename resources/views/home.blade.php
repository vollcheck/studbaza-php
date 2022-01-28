@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
		<div class="card-body">

		    @if (session('status'))
			<div class="alert alert-success" role="alert">
			    {{ session('status') }}
			</div>
		    @endif

		    @guest
		        In order to see the content, please
			<a href="{{ route('login') }}">{{ __('log in') }}</a>
			or
			<a href="{{ route('register') }}">{{ __('register') }}</a>.

                    @elseif (Auth::user()->is_admin)
			<ul class="nav navbar-nav">
                            <li><a href="{{ URL::to('subjects') }}">Subjects</a></li>
			    <li><a href="{{ URL::to('users') }}">Users</a></li>
			    <li><a href="{{ URL::to('groups') }}">Groups</a></li>
			    <li><a href="{{ url('/home') }}">home page</a></li>
			    <li><a href="{{ url('/') }}">welcome page</a></li>
			</ul>

                    @else
			You need administrator role to see the content.
		    @endguest
		</div>
            </div>
        </div>
    </div>
</div>
@endsection
