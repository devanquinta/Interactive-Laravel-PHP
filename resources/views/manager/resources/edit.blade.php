@if((Auth::user()->role_id) == 1)
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">
@endif
<link href="{{ asset('css/user.css') }}" rel="stylesheet">

@extends('layouts.manager')

@section('content')
@if((Auth::user()->role_id) != 2)
<div class="container container-user">
    <div class="row">
        <div class="mt-4 col-md-12 d-flex justify-content-between align-items-center">
            <h4 class="title_user" style="margin-top:2%; padding-bottom: 2%;">
                EDITAR RECURSOS
            </h4>
        </div>
    </div>
    <div class="row txt_index">
        <div class="col-md-12">
            <hr>
            <form action="{{route('resources.update', $resource->id)}}"  method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nome do Recurso</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ex.: Listar Tópicos" value="{{$resource->name}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Recurso (recurso.subrecurso)</label>
                    <input type="text" class="form-control @error('resource') is-invalid @enderror" name="resource" placeholder="Ex.: threads.index" value="{{$resource->resource}}">
                    @error('resource')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <br>
                 <div class="form-group">
                    <button class="btn_azul1">
                        ATUALIZAR
                    </button>
                </div>
                <div class="form-group" style="opacity: 0">
                    <label> Faz parte do menu?</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" checked id="isMenu1" name="is_menu" class="custom-control-input" value="1" @if($resource->is_menu) checked @endif>
                        <label class="custom-control-label" for="isMenu1">Sim</label>
                    </div>

                    <div class="custom-control custom-radio" style="display: none">
                        <input type="radio" id="isMenu2" name="is_menu" class="custom-control-input" value="0">
                        <label class="custom-control-label" for="isMenu2">Não</label>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endif
{{-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ --}}
@if((Auth::user()->role_id) == 2)
<div class="row margin_row_root">
    <div class="mt-4 col-md-12 d-flex justify-content-between align-items-center">
        <h4 class="txt_index_root2">EDITAR RECURSO</h4>
    </div>
</div>
<div class="row txt_index_root2">
    <div class="col-md-12">
        <hr>
        <form action="{{route('resources.update', $resource->id)}}"  method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nome do Recurso</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ex.: Listar Tópicos" value="{{$resource->name}}">
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Recurso (recurso.subrecurso)</label>
                <input type="text" class="form-control @error('resource') is-invalid @enderror" name="resource" placeholder="Ex.: threads.index" value="{{$resource->resource}}">
                @error('resource')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <button class="btn btn-outline-success" style="font-size:bold; font-family: Verdana, Geneva, Tahoma, sans-serif">
                    ATUALIZAR
                </button>
            </div>
            <div class="form-group" style="opacity: 0">
                <label> Faz parte do menu?</label>
                <div class="custom-control custom-radio">
                    <input type="radio" checked id="isMenu1" name="is_menu" class="custom-control-input" value="1" @if($resource->is_menu) checked @endif>
                    <label class="custom-control-label" for="isMenu1">Sim</label>
                </div>

                <div class="custom-control custom-radio" style="display: none">
                    <input type="radio" id="isMenu2" name="is_menu" class="custom-control-input" value="0">
                    <label class="custom-control-label" for="isMenu2">Não</label>
                </div>

            </div>
        </form>
    </div>
</div>
@endif
@endsection
