<link href="{{ asset('css/topic.css') }}" rel="stylesheet">

@extends('layouts.app')
{{-- layout dos tópicos depois de clicados --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <hr style="border: 1px solid rgb(250, 252, 253)">
            <h2 class="title_topic">
                 {{ $topic->title }}
            </h2>
            <hr style="border: 1px solid rgb(251, 252, 253)">
        </div>
        <hr>
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="padding:20px">
                    <small class="text_topic">Pergunta criada por <span  class="nome_topic">{{ $topic->user->name }}</span> á {{ $topic->created_at->diffForhumans() }}</small>
                </div>
                <div class="card-body" style="font-size: larger; font-family: Verdana, Geneva, Tahoma, sans-serif">
                    {{ $topic->body }}
                </div>

                @auth
                @if( (Auth::user()->role_id) == 2  or  (Auth::user()->role_id) == 1)
                <div class="card-footer" style="height:30px">

                        <a href="{{ route('topics.edit', $topic->slug) }}" class="icon_up">
                            {{-- Editar --}}
                        </a>

                        <a href="#"  class="icon_del" onclick="event.preventDefault(); document.querySelector('form.topic-rm').submit();">
                           <a href="#" onclick="return confirm('Tem certeza que deseja deletar este Tópico?')"> {{-- Deletar --}}</button>
                        </a>

                        <form action="{{ route('topics.destroy', $topic->slug) }}" method="post" style="display: none;"
                            class="topic-rm">
                            @csrf
                            @method('DELETE')
                            
                        </form>
                    </div>
                @elseif ($topic->user->name == Auth::user()->name)
                <div class="card-footer" style="height:30px">
                    @can('update', $topic)

                            <a href="{{ route('topics.edit', $topic->slug) }}" class="icon_up">
                                {{-- Editar --}}
                            </a>

                             <a href="#"  class="icon_del" onclick="event.preventDefault(); document.querySelector('form.topic-rm').submit();">
                                <a href="#" onclick="return confirm('Tem certeza que deseja deletar este Tópico?')"> {{-- Deletar --}}</button>
                            </a>

                            <form action="{{ route('topics.destroy', $topic->slug) }}" method="post" style="display: none;"
                                class="topic-rm">
                                @csrf
                                @method('DELETE')
                            </form>
                    @endcan
                    </div>
                    @endif
                 @endauth
                </div>
            </div>
            <hr>
        </div>
        @if ($topic->interactions->count())
            <div class="col-12">
                <br>
                <p class="resposta">
                    Respostas
                </p>
                <br>
                @foreach ($topic->interactions as $interaction)
                    <div class="card" style="margin-bottom: 1%;">
                        <div class="card-body">
                            {{ $interaction->interaction }}
                        </div>
                        <div class="card-footer" style="padding-top: 20px">
                            <smal>Respondido por
                                <span class="nome_topic">{{ $interaction->user->name }}</span> à
                                {{ $interaction->created_at->diffForHumans() }}
                            </smal>
                                {{-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ --}}
                                    @if( (Auth::user()->role_id) == 2  or  (Auth::user()->role_id) == 1)
                                        <form action="{{route('interactions.destroy', $interaction->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Tem certeza que deseja deletar este a Resposta?')" class="icon_del2">
                                                    {{-- DELETAR --}}
                                            </button>
                                        </form>
                                    @endif
                                     {{-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ --}}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        @auth
        @if(Auth::user()->role_id != 2)
        <div class="col-12">
            <hr>
            <form action="{{ route('interactions.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="topic_id" value="{{ $topic->id }}">
                    <p for="" class="responder">
                        Responder
                </p>
                    <textarea name="interaction" id="" cols="30" rows="4"
                        class="form-control @error('interaction') is-invalid @enderror">{{ old('interaction') }}
                    </textarea>

                    @error('interaction')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button action="submit" class="btn btn-sm btn-success btn_topic" >
                    ENVIAR
                </button>
            </form>
        </div>
        @endif
        {{-- usuario logado --}}
        @endauth
    </div>

@endsection
