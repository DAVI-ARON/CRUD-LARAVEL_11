@extends('admin.layouts.app')
@section('title', 'Formulário de edição')

@section('content')
    <h1>Editar Usuário - {{ $user->name }}</h1>
    <form method="post" action="{{ route('users.update', $user->id) }}">
        @method('PUT')
        @include('admin.users.partials.form')
    </form>
@endsection
