<link href="{{ asset('css/user.css') }}" rel="stylesheet">

@extends('layouts.manager')

@section('content')
@if((Auth::user()->role_id) == 2)
    <div class="row margin_row_root">
        <div class="mt-4 col-md-12 d-flex justify-content-between align-items-center">
            <h4 class="txt_index_root2">CRIAR CANAIS</h4>
        </div>
    </div>

    <div class="row txt_index_root2">
       <div class="col-md-12">
           <hr>
           <form action="{{route('channels.store')}}"  method="post">
               @csrf
               <div class="form-group">
                   <label>Nome do Canal</label>
                   <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Canal">

                   @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                   @enderror
               </div>

               <div class="form-group">
                <label>Descrição do Canal</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Descrição">

                @error('descripition')
                 <div class="invalid-feedback">
                     {{$message}}
                 </div>
                @enderror
            </div>
            <br>
               <div class="form-group">
                   <button class="btn btn-outline-success" style="font-size:bold; font-family: Verdana, Geneva, Tahoma, sans-serif">CRIAR</button>
               </div>
           </form>
       </div>
    </div>
@endif
@endsection
