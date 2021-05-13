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
                <a href="{{route('resources.create')}}" class="btn btn-outline-dark" style="margin-left:74%;width:9%; padding:0.60%;">
                    <small style="text-shadow: 1px 1px #7e95f5">
                        CRIAR
                    <small>
                </a>
            @else
                <a href="{{route('resources.create')}}" class="btn btn-outline-dark" style="margin-left:88%;width:9%; padding:0.60%;">
                    <small style="text-shadow: 1px 1px #7e95f5">
                        CRIAR
                    <small>
                </a>
            @endif
        </div>
    </div>
    @if((Auth::user()->role_id) != 2) <br><br><br><br> @else <br><br> @endif
    <div class="row" @if((Auth::user()->role_id) == 2) style="margin-top:-0.5%" @endif>

        <table class="table table-striped txt_index2">
            <thead @if((Auth::user()->role_id) == 1)
                style="font-size: bold; color:rgb(47, 4, 88)"
                @else
                style="font-size: bold; color:#000"
                @endif>
                <tr>
                    <th style="padding:20px">ID</th>
                    <th style="padding:20px">Recurso</th>
                    <th style="padding:20px">Data - Hora</th>
                    <th style="padding:20px">Editar</th>
                    <th style="padding:20px;padding-right: 28px;">Deletar</th>
                </tr>
            </thead>
            @if(Auth::user()->role_id != 2)
            <tbody class="txt_index" style="font-size:16px">
            @forelse($resources as $resource)
                <tr>
                    <td>{{$resource->id}}</td>
                    <td>{{$resource->name}}:<span class="resource_txt">{{$resource->resource}}</span></td>
                    <td>{{$resource->created_at->format('d/m/Y H:i:s')}}</td>
                    <td>
                        <a href="{{route('resources.edit', $resource->id)}}" class="up" style="position:absolute;margin-top:0%;margin-left:1%">
                                {{-- EDITAR --}}
                        </a>
                    <td>
                    <td>
                        <form action="{{route('resources.destroy', $resource->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Tem certeza que deseja deletar este recurso?')"
                                <button class="del_blue" style="margin-left:-10.5%;margin-top:0%;">
                                    {{-- REMOVER --}}
                                </button>

                            <br>
                        </form></div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum recurso cadastrado!</td>
                </tr>
            @endforelse
            </tbody>
{{-- ROOT @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ --}}

{{-- ROOT @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ --}}

{{-- ROOT @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ --}}
            @elseif(Auth::user()->role_id == 2)
                @forelse($resources as $resource)
                    <tr class="txt_index_root" style="padding: 20px; font-size:16px">
                        <td class="padding">{{$resource->id}}</td>
                        <td>{{$resource->name}}:<span class="badge badge-danger" style="background: rgb(39, 38, 38); margin-left:1%; font-size:14px">{{$resource->resource}}</td>
                        <td>{{$resource->created_at->format('d/m/Y H:i:s')}}</td>
                        <td>
                            <a href="{{route('resources.edit', $resource->id)}}" class="up_black_c" style="position:absolute;margin-left:1%;margin-top:0%">
                                    {{-- EDITAR --}}
                            </a>
                        <td>
                        <td style="padding:28px">
                            <form action="{{route('resources.destroy', $resource->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Tem certeza que deseja deletar este recurso?')"
                                <button class="del_black_c" style="position: absolute;margin-left:-14%; margin-top:-1.3%;border:none;align-content: center;">
                                    {{-- REMOVER --}}
                                </button>
                            </form></div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Nenhum recurso cadastrado!</td>
                    </tr>
                @endforelse
            @endif
            </tbody>
        </table>
        {{$resources->links()}}
    </div>
</div>
@endsection
