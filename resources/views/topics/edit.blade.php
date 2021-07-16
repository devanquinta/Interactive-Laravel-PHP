{{-- layout de edição --}}

@extends('layouts.app')
{{-- layout dos tópicos depois de clicados --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Editar Tema</h2><hr>
        </div>
        <div class="col-12">
            <form action="{{ route('topics.update', $topic->slug) }}" method="post">
                @csrf
                @method('put')

                <div class="form-group">
                    <label>Titulo do Tema</label>
                    <input type="text" class="form-control form-control @error('title') is-invalid @enderror" name="title" value="{{ $topic->title }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>
                        Conteúdo do Tema
                    </label>
                    <textarea name="body" id="" cols="30" rows="10"
                        class="form-control @error('body') is-invalid @enderror">{{ $topic->body }}</textarea>

                    @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                    <button type="submit" class="btn btn-success">Atualizar</button>
            </form>
        </div>
    </div>

@endsection
