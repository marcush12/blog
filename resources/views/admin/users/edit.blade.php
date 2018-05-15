@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Dados Pessoais</h3>
                </div>
                <div class="box-body">
                    @if($errors->any())
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item list-group-item-danger">
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{ route('admin.users.update', $user) }}" method='POST'>
                        {{ csrf_field() }}  {{ method_field('PUT')}}
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" name='name' value="{{ old('name', $user->name) }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name='email' value="{{ old('email', $user->email) }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <input type="password" name='password' class="form-control" placeholder="Senha">
                            <span class="help-block">Deixe em branco para manter a senha atual.</span>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Repita a Senha:</label>
                            <input type="password" name='password_confirmation' class="form-control" placeholder="Repita a Senha">
                        </div>
                        <button class="btn btn-primary btn-block">Atualizar usuário</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
