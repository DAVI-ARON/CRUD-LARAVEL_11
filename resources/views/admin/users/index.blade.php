@extends('admin.layouts.app')
@section('title', 'Lista de Inscritos')

@section('content')

    <x-alerts/>

    <a href="{{ route('users.create') }}">Novo Usuário</a>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        E-Mail
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions

                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Edit
                            </a>
                            <a href="{{ route('users.show', $user->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Details
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100">Nenhum registro encontrado!</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    {{ $users->links() }}
@endsection
