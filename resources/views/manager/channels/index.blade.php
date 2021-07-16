<link href="{{ asset('css/user.css') }}" rel="stylesheet">
@extends('layouts.manager')

@section('content')
    <div class="row">
        <div class="mt-4 col-md-12 d-flex justify-content-between align-items-center">
            <h4 class="txt_index_root2">CANAIS DO SISTEMA</h4>
            <a href="{{route('channels.create')}}" class="btn btn-outline-dark"><small>CRIAR</small></a>
        </div>
    </div>
    <br>
    <div class="row">
        <table class="table table-striped">
            <thead class="txt_index2">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data - Hora</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody class="txt_index_root2">
            @forelse($channels as $channel)
            @if((Auth::user()->role_id) == 2)
                <tr>
                    <td>{{$channel->id}}</td>
                    {{-- <td>{{$channel->name}}</td> --}}
                    <td>
                        {{$channel->channel()->count() ? $channel->name : 'Sem papél associado!'}}
                    </td>
                    <td>{{$channel->created_at->format('d/m/Y H:i:s')}}</td>
                    <td>
                        <a href="{{route('channels.edit', $channel->id)}}" class="up_black_c" style="margin-left: -0%">
                                {{-- EDITAR --}}
                        </a>
                    <td>
                    <td>
                        <form action="{{route('channels.destroy', $channel->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Tem certeza que deseja deletar este Canal?')"
                                <button class="del_black" style="margin-left:-155%">
                                    {{-- DELETAR --}}
                                </button>
                        </form>
                        </div>
                    </td>

                </tr>
            @endif
            @empty
                <tr>
                    <td colspan="3">Nenhum Canal cadastrado!</td>
                </tr>
            @endforelse

            </tbody>
        </table>
        {{$channels->links()}}
    </div>

@endsection
