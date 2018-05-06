@extends('admin.layout')
@section('content')
    <h1>Dashboard</h1>
    <p>Usuário autenticado: {{ auth()->user()->name }}</p>
@endsection
