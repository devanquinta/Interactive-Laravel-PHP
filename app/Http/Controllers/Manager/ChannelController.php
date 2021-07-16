<?php

namespace App\Http\Controllers\Manager;

use App\Channel;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\ChannelRequest;

// use App\Http\Requests\Request;


class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @var Channel
     */
    private $channel;

    public function __construct(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function index()
    {

        $channels = $this->channel->paginate(10);

        return view('manager.channels.index', compact('channels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.channels.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ChannelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChannelRequest $request)
    {
        
        try {
            $channel = $request->all();

            $channel['slug'] = Str::slug($channel['name']);
            $this->channel->create($channel);


            // $this->channel->create($request->all($channel));

            flash('Canal atualizado com sucesso!')->success();
            return redirect()->route('channels.index');

        } catch (\Exception$e) {
            $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';

            flash($message)->error();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel) //$id
    {
        return redirect()->route('channels.edit', $channel->id);
        // return redirect()->route('resources.edit', $id);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel) //$id
    {
        $channel = $this->channel->find($channel->id);
        // $resource = $this->resource->find($id);
        return view('manager.channels.edit', compact('channel'));
        // return view('manager.resources.edit', compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ChannelRequest  $request
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function update(ChannelRequest $request, Channel $channel) //$id
    {
        try {
            $channel = $this->channel->find($channel->id); // $id
            $channel->update($request->all());

            flash('Canal atualizado com sucesso!')->success();
            return redirect()->route('channels.index');

        } catch (\Exception$e) {
            $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';

            flash($message)->error();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        try {
            $channel = $this->channel->find($channel->id);//$id
            $channel->delete();

            flash('Recurso removido com sucesso!')->success();
            return redirect()->route('resources.index');

        } catch (\Exception$e) {
            $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar remoção...';

            flash($message)->error();
            return redirect()->back();
        }
    }
}
