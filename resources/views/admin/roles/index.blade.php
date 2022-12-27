@extends('layouts.app')
@section('content')
<div class="contanier-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4>Perfiles</h4>
                    <div class="table-responsive">
                        <table class="table" id="profileTable"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/Not/perfiles.js ')}}"></script>
@endsection

