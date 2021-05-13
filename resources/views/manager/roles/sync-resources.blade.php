<link href="{{ asset('css/user.css') }}" rel="stylesheet">

@if((Auth::user()->role_id) == 1)
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">
@endif
@extends('layouts.manager')

@section('content')
@if((Auth::user()->role_id) != 2)
<div class="container container-user">
@endif
    <div class="row"  @if((Auth::user()->role_id) == 2) style="margin-top:-1%;" @else style="margin-top:-1.5%;" @endif>
        <div class="mt-4 col-md-12 d-flex justify-content-between align-items-center">
            @if((Auth::user()->role_id) == 2)
                <h2 class="txt_index_root2 page-item">SINCRONIZAR PAPEL E RECURSOS</h2>
                {{-- <strong>{{$role->name}}</strong> --}}
            @else
                <h2 class="title_user padding_user">SINCRONIZAR PAPEL E RECURSOS</h2>
                {{-- : <strong>{{$role->name}}</strong> --}}
            @endif
        </div>
    </div>
    <div class="mt-4 row">
        <div class="col-md-12">
            <hr>
            <form action="{{route('roles.resources.update', $role->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    @foreach($resources as $resource)
                        <div class="pt-4 pb-4 col-md-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox"
                                       name="resources[]"
                                       class="custom-control-input"
                                       id="customCheck{{$resource->id}}"zxzx\zzxxz
                                       value="{{$resource->id}}"
                                       @if($role->resources->contains($resource)) checked @endif>
                                @if((Auth::user()->role_id) != 2)
                                    <label class="custom-control-label  txt_index" for="customCheck{{$resource->id}}">
                                    {{$resource->resource}}
                                    </label>
                                @else
                                    <label class="custom-control-label  txt_index_root2" for="customCheck{{$resource->id}}">
                                    {{$resource->resource}}
                                    </label>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    <div class="form-group col-md-12">
                        <div class="">
                            <hr>
                            @if((Auth::user()->role_id) == 1)
                                <button class="btn_white" type="submit" style="margin-top:-1.5%; margin-left: -1%; position:absolute;">
                                    ADICIONAR
                                </button>
                            @else
                                <button class="btn btn-outline-success" type="submit">
                                    ADICIONAR
                                </button>
                            @endif

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
