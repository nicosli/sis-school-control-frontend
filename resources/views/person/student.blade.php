@extends('template.app')
@section('title', 'Estudiantes')

@section('menu')
    @parent
    @include('menu', ['item' => 'inicio'])
    @include('person.submenu', ['item' => 'student'])
@endsection

@section('contenido')
<main role="main" class="container">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-primary rounded box-shadow">
        <i class="mr-3 fas fa-user-circle fa-2x"></i>
        <div class="lh-100">
            <h6 class="mb-1 text-white lh-100">Estudiantes</h6>
            <p class="mb-0">Administración</p>
        </div>
    </div>
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <list-person type="7"></list-person>
    </div>
</main>
@endsection

@section('script')
@endsection