{{-- Header --}}
<header class="container-fluid p-0">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Navbar</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	    <div class="navbar-nav">
	    	@if (auth::user())

	    	  @if (auth()->user()->cart)
		      	<a class="nav-item nav-link active" href="{{ url('cart/') }}">Carrito <span class="sr-only">(current)</span></a>
	    	  @endif

		      <a class="nav-item nav-link" href="{{ url('logout') }}" tabindex="-1">Logout</a>
	    	@else
		      <a class="nav-item nav-link" href="{{ url('login') }}" tabindex="-2">Login</a>
	    	@endif
	    </div>
	  </div>
	</nav>
</header>
{{-- Header end --}}