@extends('dashboard.layouts.main')

@section('container')
<div class="row">
	<div class="col-lg-6">
		<form action="/jurusandashboard" method="post">
			@csrf
			<div class="mb-3">
				<label class="form-label">Nama</label>
				<input type="text" class="form-control" name="nama" isInvalid id="nama">
			</div>
			
			<div class="mb-3">
				<button type="submit" name="submit" class="btn btn-primary">Create</button>
			</div>
		</form>
	</div>
</div>
@endsection