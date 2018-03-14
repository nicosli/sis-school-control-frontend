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
        <div class="row">
            <div class="col-xl-3 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <p class="font-weight-bold d-inline" data-toggle="tooltip" data-placement="top" title="Acriss: SFAR">
                            {!!$me->firstname!!}
                            {!!$me->lastname!!}
                        </p>
                        <div class="clearfix mb-3"></div>
                        <div class="lineAuto"></div>
                        <img src="{!!asset('/img/avatar_gender_'.$me->gender.'.png')!!}" class="mx-auto d-block mb-3 mt-3">
                        <h5 class="mb-3"><span class="badge badge-primary font-weight-normal pb-1">Username {!!$me->username!!}</span></h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body">
                        {!!$me->email!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
@endsection