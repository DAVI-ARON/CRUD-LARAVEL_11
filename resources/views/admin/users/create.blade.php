@extends('admin.layouts.app')
@section('title', 'Formulário de inscrição')

@section('content')
    <h1>Formulário de inscrição</h1>
    <form method="post" action="{{ route('users.store') }}">
        @include('admin.users.partials.form')
    </form>
@endsection
