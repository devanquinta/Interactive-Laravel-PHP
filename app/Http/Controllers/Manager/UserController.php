<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\UserRequest;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Role::get('role', 'ROLE_ADMIN')[0]->role;
        $root = Role::get('role', 'ROLE_ROOT')[1]->role;
        if (!(Auth::user()->role_id)) {
            if ((!($admin)) or (!($root))) {
                return redirect()->back();
            }

        }
        $users = $this->user->paginate(10);

        return view('manager.users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd("Catch Edit");
        $user = $this->user->find($id);
        $roles = \App\Role::all('id', 'name');

        return view('manager.users.edit', compact('user', 'roles'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        try {
            // dd("Catch Update try");
            $data = $request->all();
            
            $user = $this->user->find($id);
            $user->update($data);

            $role = \App\Role::find($data['role']);
            $user = $user->role()->associate($role);
            $user->save();
            flash('Usuário atualizado com sucesso!')->success();
            return redirect()->route('users.index');

        } catch (\Exception$e) {
            // dd("Catch Update catch");
            $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';
            flash($message)->error();
            return redirect()->back();
        }
    }
    public function show($user)
    {
        $user = $this->user->where($user)->first();
        if (!$user) {
            return redirect()->route('users.index');
        }
        return view('users.show', compact('user'));
        // dd("Show");

    }
    public function destroy($user)
    {
        try {
            $user = $this->user->where('id', $user)->first();
            // dd("Try destroy", $user);
            $user->delete();
            // flash('Removido com sucesso!')->success();
            return redirect('manager/users');

        } catch (\Exception$e) {
            // dd("Catch destroy", $user);
            $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro na requisição';
            flash($message)->warning();
            return redirect()->back();
        }
    }
}
