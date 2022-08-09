@extends('layouts.app')
@extends('layouts.dashboard')
@extends('layouts.navBar')
@section('content')

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    
    <main class="main-content position-relative border-radius-lg ">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-12">
                <table class="table table-striped" id="gridUsers">
                </table>
            </div>
        </div>
    </main>
    
        
    </div>
  </body>



@endsection

@section('scripts')
<script src="{{ asset('js/not/usuarios.js') }}"></script>
@endsection