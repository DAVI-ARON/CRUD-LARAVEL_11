@extends('admin.layouts.app')
@section('title', 'Lista de Inscritos')

@section('content')

    <x-alerts/>

    <a href="{{ route('users.create') }}">Novo Usuário</a>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}"> Edit </a>
                        <a href="{{ route('users.show', $user->id) }}"> Details </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100">Nenhum registro encontrado!</td>
                </tr>
            @endforelse

        </tbody>
    </table>
    {{ $users->links() }}
@endsection
