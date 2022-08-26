@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <h5 class="mb-0">Administracion de usuarios</h5>
            <p class="text-sm mb-0">
              panel administrativo para la administracion de personas autorizadas
            </p>
          </div>
          <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-12">
                <table class="table table-striped" id="gridUsers">
                </table>
            </div>
        </div>
        </div>
      </div>
    </div>

  </div>
@endsection
