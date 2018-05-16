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
                    <form action="{{ route('admin.users.store') }}" method='POST'>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" name='name' value="{{ old('name') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name='email' value="{{ old('email') }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Papéis</label>
                            @include('admin.roles.checkboxes')
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Permissões</label>
                            @include('admin.permissions.checkboxes')
                        </div>
                        <span class="help-block">"A senha será gerada e enviada via email ao novo usuário."</span>
                        <button class="btn btn-primary btn-block">Criar usuário</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
