<link href="{{ asset('css/user.css') }}" rel="stylesheet">

@if((Auth::user()->role_id) == 1)
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">
@endif
@extends('layouts.manager')

@section('content')
@if((Auth::user()->role_id) != 2)
<div class="container container-user">
@endif
    <div class="row @if((Auth::user()->role_id) == 2) margin_root2 @else  @endif">
        <div class="mt-4 col-md-12 d-flex justify-content-between align-items-center">
            @if((Auth::user()->role_id) == 2)
                <h4 class="txt_index_root2">
                        EDITAR USUÁRIO
                </h4><
            @else
                <h4 class="title_user" style="margin-top:2%; padding-bottom: 2%;">
                     EDITAR USUÁRIO
                </h4>
            @endif
        </div>
    </div>
    <div @if((Auth::user()->role_id) == 2) class="row txt_index_root2" @else class="txt_index" @endif>
        <div class="col-md-12">
            <hr>
            <form action="{{route('users.update', $user->id)}}"  method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nome Completo</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ex.: Listar Tópicos" value="{{$user->name}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                @if(Auth::user())
                <div class="form-group" style="display: none">
                        <label>Senha</label>
                        <input type="text" class="form-control" name="password" value="{{$user->password}}"  autocomplete="off">
                        {{-- <input type="password" class="form-control" name="password"> --}}
                </div>
                <div class="form-group" style="display: none">
                        <label>Confirmar Senha</label>
                        {{-- <input type="password" class="form-control" name="password_confirmation" value="{{$user->password}}" > --}}
                        {{-- <input type="password" class="form-control" name="password_confirmation"> --}}
                </div>
                @endif
                <div class="form-group">
                    <label>Papéis</label>
                    <select name="role" class="form-control">
                        <option value="">Selecionar o Papél do Usuário</option>
                        @foreach($roles as $role)
                        @if($role->id != 2)
                            <option value="{{$role->id}}"
                                @if($user->role()->count() && $user->role->id == $role->id) selected @endif>{{$role->name}}</option>
                        @elseif(Auth::user()->role_id == 2)
                            <option value="{{$role->id}}"
                                @if($user->role()->count() && $user->role->id == $role->id) selected @endif>{{$role->name}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                    @if((Auth::user()->role_id) == 2)
                        <button class="btn btn-outline-success" style="font-size:bold; font-family: Verdana, Geneva, Tahoma, sans-serif;" type="submit">
                            ATUALIZAR
                        </button>
                    @else
                        <div class="form-group">
                            <button class="btn_azul1" type="submit">
                                ATUALIZAR
                            </button>
                        </div>
                    @endif
            </form>
        </div>
    </div>
</div>
@endsection
