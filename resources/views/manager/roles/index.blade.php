@if((Auth::user()->role_id) == 1)
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">
@endif
<link href="{{ asset('css/user.css') }}" rel="stylesheet">

@extends('layouts.manager')

@section('content')
@if((Auth::user()->role_id) != 2)
<div class="container container-user">
@endif
    <div class="row">
        <div class="mt-4 col-md-12 d-flex justify-content-between align-items-center">
            @if((Auth::user()->role_id) != 2)
            <h4 class="title_user" style="margin-top:3%;
            @if((Auth::user()->role_id) != 2) position:absolute;
            @endif">
                RECURSOS DO  SISTEMA
            </h4>
        @else
            <h4 class="txt_index_root2">
                RECURSOS DO  SISTEMA
            </h4>
        @endif
        @if((Auth::user()->role_id) == 2)
            <a href="{{route('roles.create')}}" class="btn btn-outline-dark" style="margin-left:74%;width:9%; padding:0.60%;">
                <small style="text-shadow: 1px 1px #7e95f5">
                    CRIAR
                <small>
            </a>
        @else
            <a href="{{route('roles.create')}}" class="btn btn-outline-dark" style="margin-left:88%;width:9%; padding:0.60%;">
                <small style="text-shadow: 1px 1px #7e95f5">
                    CRIAR
                <small>
            </a>
        @endif
        </div>
    </div>
    @if((Auth::user()->role_id) != 2) <br><br><br><br> @else <br> @endif
    <div class="row"  @if((Auth::user()->role_id) == 2) style="margin-top:0.5%" @endif>
        <table class="table table-striped txt_index2">
            <thead @if((Auth::user()->role_id) == 1)
                style="font-size: bold; color:rgb(47, 4, 88)"
                @else
                style="font-size: bold; color:#000"
                @endif>
                <tr>
                    <th style="padding:20px">ID</th>
                    <th style="padding:20px">Nome</th>
                    <th style="padding:20px">Data - Hora</th>
                    <th style="padding:20px">Editar</th>
                    <th style="padding:20px">Deletar</th>
                    <th style="padding:20px">Inserir</tr>
                </tr>
            </thead>
            <tbody class="txt_index">
            @forelse($roles as $role)
            @if(Auth::user()->role_id == 1)
                @if(($role->id != 2 and $role->id != 1 ))
                <tr style="font-size:16px">
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}: <span class="role_txt"><small>{{$role->role}}</span></td>
                    <td>{{$role->created_at->format('d/m/Y H:i:s')}}</td>
                    <td>
                        <a href="{{route('roles.edit', $role->id)}}" class="up" style="position:absolute;margin-top:0%;margin-left:0%">
                            {{-- EDITAR --}}
                        </a>
                    <td>
                        <form action="{{route('roles.destroy', $role->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Tem certeza que deseja deletar este Papel?')"
                            <button class="del_blue" style="position: absolute;margin-left:1%; margin-top:0%;border:none">
                                {{-- REMOVER --}}
                            </button>
                            <br>
                        </form>
                    </td>
                    <td>
                        <a href="{{route('roles.resources', $role->id)}}" class="insert" style="position: absolute;magin-left:0;margin-right: 0%;margin-top:0%;";>
                            {{-- ADICIONAR --}}
                        </a>
                    </td>
                </tr>
                @endif
{{--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ --}}

{{--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ --}}

{{-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ --}}
            @else
                <tr class="txt_index_root" style="font-size:16">
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}: <span class="badge badge-danger" style="background: rgb(39, 38, 38)"><small>{{$role->role}}</small></td>
                    <td>{{$role->created_at->format('d/m/Y H:i:s')}}</td>
                    <td>
                        <a href="{{route('roles.edit', $role->id)}}" class="up_black_c";>
                                {{-- EDITAR --}}
                        </a>
                    </td>
                    <td>
                        <form action="{{route('roles.destroy', $role->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Tem certeza que deseja deletar este Papel?')"
                            <button class="del_black_c" style="position:relative; margin-top:0%; margin-left:1%; margin-top:0%; margin-bottom: -20px">
                                {{-- REMOVER --}}
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="{{route('roles.resources', $role->id)}}" class="insert_black" style="position: absolute;margin-left: 0%;margin-top:-0.3%">
                                {{-- Adicionar --}}
                        </a>
                        </div>
                    </td>
                </tr>
            @endif
                @empty
                <tr>
                    <td colspan="3">Nenhum papel cadastrado!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{$roles->links()}}
    </div>
</div>
@endsection
