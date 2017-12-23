@extends('layouts.app')

@section('content')

@if($errors->any())

<div class="alert alert-danger">
	<ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@endif

@if(isset($cr_success))

<div class="alert alert-success">
	{{$cr_success}}
</div>

@endif

@if(isset($cr_err))

<div class="alert alert-danger">
	{{$cr_err}}
</div>

@endif

<div class="container">
    <form method="post" action="/posts">
    	{{csrf_field()}}

    	<input type="text" name="title">

    	<textarea name="content">
    		
    	</textarea>

    	<input type="submit" name="submit">

    </form>
</div>
@endsection
