<link href="{{ asset('css/user.css') }}" rel="stylesheet">

@extends('layouts.manager')

@section('content')
    <div class="row margin_row_root">
        <div class="mt-4 col-md-12 d-flex justify-content-between align-items-center">
            <h4 class="txt_index_root2">EDITAR CANAL</h4>
        </div>
    </div>
@if((Auth::user()->role_id) == 2)
    <div class="row txt_index_root2">
        <div class="col-md-12">
            <hr>
            <form action="{{route('channels.update', $channel->id)}}"  method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Canal" value="{{$channel->name}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <input type="descripition" class="form-control @error('description') is-invalid @enderror" name="description" value="{{$channel->description}}">
                    @error('description')
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
            </form>
        </div>
    </div>
@endif
@endsection
