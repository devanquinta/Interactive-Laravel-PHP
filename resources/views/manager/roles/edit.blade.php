@if((Auth::user()->role_id) == 1)
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">
@endif
<link href="{{ asset('css/user.css') }}" rel="stylesheet">

@extends('layouts.manager')

@section('content')
@if((Auth::user()->role_id) != 2)
<div class="container container-user">
@endif
@if((Auth::user()->role_id) == 2)
    <div class="row margin_row_root">
        <div class="mt-4 col-md-12 d-flex justify-content-between align-items-center">
            <h4 class="txt_index_root2">
                EDITAR PAPEL DO USUÀRIO
            </h4>
        </div>
    </div>
    <div class="row txt_index_root2">
        <div class="col-md-12">
            <hr>
            <form action="{{route('roles.update', $role->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nome do Papel</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ex.: Administrador" value="{{$role->name}}">

                    @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Papel (ROLE_*)</label>
                    <input type="text" class="form-control @error('role') is-invalid @enderror" name="role" placeholder="Ex.: ROLE_ADMIN" value="{{$role->role}}">

                    @error('role')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <br>
                <div class="form-group">
                    @if((Auth::user()->role_id) == 2)
                        <button class="btn btn-outline-success" style="font-size:bold; font-family: Verdana, Geneva, Tahoma, sans-serif;" type="submit">
                            ATUALIZAR
                        </button>
                    @else
                        <button class="btn_azul1" type="submit">
                            ATUALIZAR
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endif
{{--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ --}}

{{--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ --}}

{{-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ --}}
@if((Auth::user()->role_id) != 2)
    <div class="row">
        <div class="mt-4 col-md-12 d-flex justify-content-between align-items-center">
            <h4 class="title_user" style="margin-top:2%; padding-bottom: 2%;">
                EDITAR PAPEL 
            </h4>
        </div>
    </div>
    <div class="row txt_index">
        <div class="col-md-12">
            <hr>
            <form action="{{route('roles.update', $role->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nome do Papél</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ex.: Administrador" value="{{$role->name}}">

                    @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Papél (ROLE_*)</label>
                    <input type="text" class="form-control @error('role') is-invalid @enderror" name="role" placeholder="Ex.: ROLE_ADMIN" value="{{$role->role}}">

                    @error('role')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button class="btn_azul1">ATUALIZAR</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
