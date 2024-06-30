@extends('admin.layouts.app')
@section('title', 'Formulário de inscrição')

@section('content')
    <h1>Formulário de inscrição</h1>

    <x-alerts/>

    <form method="post" action="{{ route('users.store') }}">
        @csrf

        <input type="text" name="name" id="name" placeholder="Nome" value="{{ old('name') }}">  {{-- old('name') pega o valor do campo --}}
        <input type="email" name="email" id="email" placeholder="E-Mail" value="{{ old('email') }}">
        <input type="password" name="password" id="password" placeholder="Senha">

        <button type="submit">Salvar Inscrição</button>
    </form>
@endsection
