<link href="{{ asset('css/topic.css') }}" rel="stylesheet">

{{-- layout de edição --}}

@extends('layouts.app')
{{-- layout dos tópicos depois de clicados --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <h2 class="title_topic">Criar Tópico</h2>
            <hr>
        </div>
        <div class="col-12">
            <form action="{{ route('topics.store') }}" method="post">
                @csrf

                <div class="form-group">

                    <label class="text_topic">
                        DISCIPLINA
                    </label>

                    <select name="channel_id" id="" class="form-control @error('channel_id') is-invalid @enderror text_topic">
                        <option value="#">Digite a disciplina...</option>
                        @foreach ($channels as $channel)
                            <option value="{{ $channel->id }}" @if (old('channel_id') == $channel->id) selected @endif>
                                {{ $channel->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('channel_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label class="text_topic">
                        Título do Tópico
                    </label>
                       

                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        value="{{ old('title') }}">

                    @error('title')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

                <div class="form-group">
                    <label class="text_topic">
                        Conteúdo do Tópico
                    </label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{ old('body') }}
                    </textarea>
                    @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success btn_topic">Criar Tema</button>

            </form>
        </div>
    </div>

@endsection
