@extends('template.app')
@section('title', 'Inicio')

@section('menu')
    @parent
    @include('menu', ['item' => 'inicio'])
@endsection

@section('contenido')
<main role="main" class="container">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-primary rounded box-shadow">
        <i class="mr-3 fas fa-cloud fa-2x"></i>
        <div class="lh-100">
            <h6 class="mb-1 text-white lh-100">Dashboard</h6>
            <p class="mb-0">Módulo inicio</p>
        </div>
    </div>
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <dashboard></dashboard>
    </div>
</main>
@endsection

@section('script')
@endsection