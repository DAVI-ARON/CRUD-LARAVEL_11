@extends('admin.layouts.app')
@section('title', 'Formulário de edição')

@section('content')
    <h1>Editar Usuário - {{ $user->name }}</h1>

    <x-alerts/>

    <form method="post" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')
        <input type="text" name="name" id="name" placeholder="Nome" value="{{ $user->name }}">  {{-- old('name') pega o valor do campo --}}
        <input type="email" name="email" id="email" placeholder="E-Mail" value="{{ $user->email }}">
        <input type="password" name="password" id="password" placeholder="Senha">

        <button type="submit">Salvar Inscrição</button>
    </form>
@endsection
