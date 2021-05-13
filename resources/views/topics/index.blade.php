<link href="{{ asset('css/topic.css') }}" rel="stylesheet">

{{-- Layout dos Tópicos --}}
@extends('layouts.app')
{{-- tópico não encontrado --}}
@section('content')

<span class="gato">
</span>
    <div class="row" id="star">
        <div class="col-12">
            <hr style="border: 2px rgb(248, 250, 252) solid; box-shadow: #343a40 1px 1.5px">
                 <h5 style="font-weight: bold;font-style:italic ;
                 color:rgb(250, 248, 248); font-family:verdana, Haettenschweiler, 'Arial Narrow Bold', sans-serif;text-shadow: 1px 1px #000105">
                 TÓPICOS
                </h5>
            <hr style="border: 2px rgb(248, 251, 253) solid; margin-bottom:2%; box-shadow: #343a40 1px 1.5px">
            <br>
        </div>
        <div class="col-12" style="text-shadow: 1px 1px #000105">
            @forelse($topics as $topic)
                <div class="list-group"  id="topic_1">
                    <span class="badge badge-primary" id="topic_3">
                        {{ $topic->channel->slug }}
                    </span>
                    <a href="{{ route('topics.show', $topic->slug) }}"
                        class="list-list-group-item list-group-item-action alert-light d-flex justify-content-sm-between align-items-center"
                        style="border-bottom: 1px solid rgb(220, 220, 236);padding:10px">
                        <div id='topic_2'>
                            <h5>{{ $topic->title }}</h5>
                            <small>
                                Criado em {{ $topic->created_at->diffForhumans() }} por <span class="nome_topic">{{ $topic->user->name}}</span>
                                {{-- @dd($topic->user->name) --}}
                            </small>
                        </div>
                        <div class="star">
                            <img src="img/star.png" class="star_2" alt="https://br.freepik.com/">
                            <div class="star_1">
                                {{ $topic->interactions->count() }}
                            </div>
                        </div>

                    </a>
                </div>
            @empty
                <div class="alert alert-primary">
                    <h1 style="color:#343a40;font-style: italic; font-weight:larger">Não encontrado</h1>
                </div>
            @endforelse
            {{ $topics->links() }}
        </div>
    </div>
@endsection


