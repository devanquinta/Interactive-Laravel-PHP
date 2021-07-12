<?php

namespace App\Http\Controllers;

use App\Http\Requests\InteractionRequest;
use App\Interaction;
use App\Topic;
use App\Http\Requests\TopicRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class InteractionController extends Controller
{
    /**
     * Display a listing of the interaction.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @var Interaction
     */
    private $interaction;

    public function __construct(Interaction $interaction)
    {
        $this->interaction = $interaction;
    }
    public function store(InteractionRequest $request)
    {
        try
        {

            $interaction = $request->all();
            
            $user = User::find(Auth::user()->id);
            
            $interaction['user_id'] = $user->id;
            $topic = Topic::find($request->topic_id);
            $topic->interactions()->create($interaction);

            flash('Resposta criada com sucesso')->success();

            return redirect()->back();

        } catch (\Exception$e) {
            $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao postar a menssagem! ';
            flash($message)->warning();
            return redirect()->back();
        }
    }

    public function destroy(Interaction $interaction)
    {
        try {

            $interaction = $this->interaction->find($interaction->id);
            // dd($interaction->id); //$id
            $interaction->delete();

            flash('Resposta removida com sucesso!')->success();
            // return redirect()->route('topics.show');
            return redirect()->back();

        } catch (\Exception$e) {
            $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar remoção...';

            flash($message)->error();
            return redirect()->back();
        }
    }
}
