<?php
namespace App\Http\Controllers;

use App\Channel;
use App\Http\Requests\TopicRequest;
use App\Interaction;
use App\Topic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    /**
     * Theads são os topics das perguntas
     */
    private $topic;

    public function __construct(Topic $topic)
    {
        $this->topic = $topic;
        // me
        $this->middleware('auth');
    }

    //me
    public function auth()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Channel $channel)
    {
        $channelParam = $request->channel;
        if (null !== $channelParam) {
            // $topics = Channel::whereSlug($channelParam)->first()->topics;
            $topics = $channel->whereSlug($channelParam)->first()->topics()->paginate(10);
        } else {
            $topics = $this->topic->orderBy('created_at', 'DESC')->paginate(10);
            // pagination of index
        }
        return view('topics.index', compact('topics'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Channel $channel)
    {

        try {
            return view('topics.create', ['channels' => $channel->all()]);
        } catch (\Exception$e) {

            $message = env('APP_DEBUG') ? $e->getMessage() : 'Error! Não existe um canal';
            flash($message)->warning();
            return redirect()->back();
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  TopicRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopicRequest $request)
    {
        try {
            $topic = $request->all();
            $topic['slug'] = Str::slug($topic['title']);
            $user = User::find(Auth::user()->id);
            $topic = $user->topics()->create($topic);
            flash('Tópico criado com sucesso')->success();
            return redirect()->route('topics.show', $topic->slug);

        } catch (\Exception$e) {
            // $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro na requisição';
            flash("Erro! Você esqueceu o Curso ou deixou um  campo vazio.")->warning();
            return redirect()->back();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  string $topic
     * @return \Illuminate\Http\Response
     */
    public function show($topic)
    {
        $topic = $this->topic->whereSlug($topic)->first();

        if (!$topic) {
            return redirect()->route('topics.index');
        }
        return view('topics.show', compact('topic'));

    }

    /*show.blade.php*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $topic
     * @return \Illuminate\Http\Response
     */
    public function edit($topic)
    {

        $topic = $this->topic->whereSlug($topic)->first();
        //
        // $this->authorize('update', $topic);
        //
        return view('topics.edit', compact('topic'));

        flash('Atualizado com sucesso!')->success();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TopicRequest $request
     * @param  string       $topics
     * @return \Illuminate\Http\Response
     */
    public function update(TopicRequest $request, $topic)
    {

        try {
            $topic = $this->topic->whereSlug($topic)->first();

            $topic->update($request->all());

            flash('Atualizado com sucesso!')->success();

            return redirect()->route('topics.show', $topic->slug);

            // ADICIONAR UM BOTÃO DE VOLTAR
        } catch (\Exception$e) {
            $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro na requisição';
            flash($message)->warning();
            //flash('ERROR')->error();

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy($topic)
    {
        try {
            $topic = $this->topic->whereSlug($topic)->first();
            $topic->delete();
            // flash('Removido com sucesso!')->success();
            return redirect('topics');

        } catch (\Exception$e) {
            $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro na requisição';
            flash($message)->warning();
            return redirect()->back();
        }
    }
    public function delete(Interaction $interaction)
    {
        try {
            $interaction = $this->interaction->where($interaction)->first();
            dd("delete try"); //$id
            $interaction->delete();

            flash('Resposta removida com sucesso!')->success();
            // return redirect()->route('topics.show');
            return redirect()->back();

        } catch (\Exception$e) {
            dd("delet catch"); //$id

            $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar remoção...';

            flash($message)->error();
            return redirect()->back();
        }
    }
}
