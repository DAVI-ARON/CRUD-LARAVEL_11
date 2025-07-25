<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index() {
        $users = User::paginate(5); //Já retorna de forma paginada com limite de 5 usuários //User::all(); //Retorna o último usuário cadastrado
        //dd($users); //Usado para dar um "dumpDie", ou seja, ele mostra o resultado e mata o processo

        return view('admin.users.index', compact('users'));
    }

    public function create() {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request) {
        User::create($request->validated());

        return redirect()->route('users.index')->with('success', 'Usuário inscrito com sucesso!');
    }

    public function edit(string $id) {
        if(!$user = User::find($id)) {
            return redirect()->route('users.index')->with('Warning', 'Usuário não encontrado!');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, string $id) {
        if(!$user = User::find($id)) {
            return back()->with('Warning', 'Usuário não encontrado!');
        }

        $data = $request->only('name', 'email');
        if($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')
            ->with('success', 'Usuário editado com sucesso!');
    }

    public function show(string $id) {
        if (!$user = User::find($id)) {
            // dd($user);
            return redirect()->route('users.index')->with('Warning', 'Usuário não encontrado!');
        }

        return view('admin.users.show', compact('user'));
    }

    public function destroy(string $id) {
        // if(Gate::denies('delete-users')) { --> ::denies serve para verificar se o usuário "não é", e existe o allows que verifica se o usuário "é".
        //     return redirect()->route('users.index')->with('warning', 'Acesso negado!');
        // }

        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('Warning', 'Usuário não encontrado!');
        }

        if (Auth::user()->id === $user->id) {
            return back()->with('warning', 'Você não pode deletar o seu próprio usuário!');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
