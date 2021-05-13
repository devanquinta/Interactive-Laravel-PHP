




<link href="{{ asset('css/user.css') }}" rel="stylesheet">
@if((Auth::user()->role_id) == 1)
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">
@endif
@extends('layouts.manager')

@section('content')
@if((Auth::user()->role_id) != 2)
    <div class="container container-user">
    <div class="row">
        <div class="mt-4 col-md-12 d-flex justify-content-between align-items-center">
            <h4 class="title_user" style="margin-top:2%;padding-bottom:2%">
                CONFIGURAÇÕES DE USUÁRIOS
            </h4>
        </div>
    </div>
    <br>
    <div class="row">
        <table class="table table-striped txt_index2">
            <thead @if((Auth::user()->role_id) == 1)
                style="font-size: bold; color:rgb(47, 4, 88)"
                @else
                style="font-size: bold; color:#000"
                @endif>
                <tr>
                    <th style="padding:20px">ID</th>
                    <th style="padding:20px">Nome</th>
                    <th style="padding:20px">Papel</th>
                    <th style="padding:20px">Data - Hora</th>
                    <th style="margin-right: -50%;padding:20px">Editar</th>
                </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
            @if($user->role_id != 2 and (Auth::user()->role_id) != 2)
                <tr class="txt_index" style="font-size:16px;">
                    <td style="padding:20px">{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>
                        {{$user->role()->count() ? $user->role->name : 'Sem papél associado!'}}
                    </td>
                    <td>
                        {{$user->created_at->format('d/m/Y H:i:s')}}
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('users.edit', $user->id)}}" class="up" style="margin-left: 8%">
                                {{-- EDITAR --}}
                            </a>
                        </div>
                    </td>
                </tr>
            @endif
            @empty
                <tr>
                    <td colspan="3">Nenhum usuário cadastrado!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
       <div style="padding-top: 2%;position: relative;bottom:0%;">{{$users->links()}}</div>
    </div>
</div>
@endif
{{-- ROOT @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ --}}

{{-- ROOT @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ --}}

{{-- ROOT @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ --}}
@if((Auth::user()->role_id) == 2)
<div class="row">
        <div class="mt-4 col-md-12 d-flex justify-content-between align-items-center">
            <h4 class="txt_index_root2">
                CONFIGURAÇÕES DE USUÁRIOS
            </h4>
                <a href="{{route('channels.index')}}" class="btn btn-outline-dark">
                    <small>CANAIS</small>
                </a>
        </div>
    </div>
    <br>
    <div class="row">
        <table class="table table-striped txt_index2">
            <thead>
                <tr>
                    <th style="padding:20px">ID</th>
                    <th style="padding:20px">Nome</th>
                    <th style="padding:20px">Papel</th>
                    <th style="padding:20px">Data - Hora</th>
                    <th style="margin-right: -50%;padding:20px">Editar</th>
                    <th style="margin-left: 12%;padding:20px;">Deletar</th>
                </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr class="txt_index_root" style="font-size:16px;">
                    <td style="padding:20px">{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>
                        {{$user->role()->count() ? $user->role->name : 'Sem papél associado!'}}
                    </td>
                    <td>{{$user->created_at->format('d/m/Y H:i:s')}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('users.edit', $user->id)}}" class="up_black_c">
                                {{-- EDITAR --}}
                            </a>
                        </div>
                    </td>
                    <td>
                    <form action="{{route('users.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Tem certeza que deseja deletar este usuário?')"
                            class="del_black button"></button>
                    </form>
                    <td>
                    </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum usuário cadastrado!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
       <div style="padding-top: 2%;position: relative;bottom:0%;">{{$users->links()}}</div>
    </div>
</div>
@endif
@endsection
