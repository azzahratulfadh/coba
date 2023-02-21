@extends('layout.main')

@section('container')
<div class="row justify-content-center">
	<div class="col-lg-5">
		@if(session()->has('errorLogin'))
		<div class="alert alert-danger" role="alert">
			{{ session('errorLogin')}}
		</div>
		@endif
		
		<main class="form-signin w-100 m-auto">
		  <form action="/login" method="post">
		  	@csrf
		    <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

		    <div class="form-floating">
		      <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" autofocus>
		      <label for="floatingInput">Email address</label>
		    </div>
		    <div class="form-floating">
		      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
		      <label for="floatingPassword">Password</label>
		    </div>

		    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
		    <hr>
                <p class="text-center">Belum punya akun silahkan <a href="/register">Register Disini!</a></p>
		  </form>
		</main>
		
	</div>
</div>
@endsection