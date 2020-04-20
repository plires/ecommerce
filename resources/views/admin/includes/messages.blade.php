{{-- message --}}
<div id="message" class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h5><i class="icon fas fa-check"></i> Alert!</h5>
	{{ session('message') }}
</div>
{{-- message end --}}

{{-- message Error --}}
<div id="error" class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h5><i class="icon fas fa-check"></i> Alert!</h5>
	{{ session('error') }}
</div>
{{-- message Error end --}}