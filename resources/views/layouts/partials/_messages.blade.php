@if (session()->has('success'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Success:</strong> {{ session('success') }}
	</div>
@endif
@if (count($errors))
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<ul>
			@foreach($errors->all() as $error)
				<li><strong>Error:</strong> {{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif