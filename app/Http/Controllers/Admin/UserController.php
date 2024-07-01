<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

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
        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'Usuário inscrito com sucesso!');
    }

    public function edit(string $id) {
        if(!$user = User::find($id)) {
            redirect()->route('users.index')->with('Warning', 'Usuário não encontrado!');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, string $id) {
        if(!$user = User::find($id)) {
            return back()->with('Warning', 'Usuário não encontrado!');
        }

        $user->update($request->only([
            'name',
            'email'
        ]));

        return redirect()->route('users.index')
            ->with('success', 'Usuário editado com sucesso!');
    }
}
