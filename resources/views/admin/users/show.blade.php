@extends('admin.layouts.app')
@section('title', 'Detalhes do Usuário')

@section('content')
    <h1>Detalhes do Usuário</h1>
    <ul>
        <li><strong>Name:</strong> {{ $user->name }}</li>
        <li><strong>E-mail:</strong> {{ $user->email }}</li>
    </ul>

    <x-alerts/>

    {{-- @can('owner', $user)
        <h1>Pode editar</h1>
    @endcan --}}

    @can('is-admin')
        <form action="{{ route('users.destroy', $user->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Deletar</button>
        </form>
    @endcan
@endsection
