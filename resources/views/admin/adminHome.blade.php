
@extends('layouts.app')

@section('content')
@include('admin.mesages')
<div class="card">
    <!-- Card image -->
    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
      <img class="border-radius-lg w-100" src="https://rodriguezescudero.com/wp-content/uploads/2020/07/abogadopenalista-1200x720.jpg" alt="Image placeholder">
      <!-- List group -->
      {{-- <ul class="list-group list-group-flush mt-2">
         <li class="list-group-item">Cras justo odio</li>
         <li class="list-group-item">Dapibus ac facilisis in</li>
         <li class="list-group-item">Vestibulum at eros</li>
      </ul> --}}
     </div>
    <!-- Card body -->
    {{-- <div class="card-body">
     <h3 class="card-title mb-3">Card title</h3>
     <p class="card-text mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis non dolore est fuga nobis ipsum illum eligendi nemo iure repellat, soluta, optio minus ut reiciendis voluptates enim impedit veritatis officiis.</p>
     <a href="#" class="btn btn-primary">Go somewhere</a>
    </div> --}}
 </div>
@endsection
