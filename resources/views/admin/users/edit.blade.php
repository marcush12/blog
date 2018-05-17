@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Dados Pessoais</h3>
                </div>
                <div class="box-body">
                    @include('partials.error-messages')
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

                        <button class="btn btn-primary btn-block">Atualizar usuário</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Papéis</h3>
                </div>
                <div class="box-body">
                    @role('Admin')
                    <form action="{{ route('admin.users.roles.update', $user) }}" method="POST">
                        {{csrf_field()}} {{method_field('PUT')}}
                        @include('admin.roles.checkboxes')
                        <button class="btn btn-primary btn-block">Atualizar Papéis</button>
                    </form>
                    @else
                        <ul class="list-group">
                            @forelse($user->roles as $role)
                                <li class="list-group-item">{{ $role->name }}</li>
                            @empty
                                <li class="list-group-item">Não tem papéis</li>
                            @endforelse
                        </ul>
                    @endrole
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Permissões</h3>
                </div>
                <div class="box-body">
                    @role('Admin')
                    <form action="{{ route('admin.users.permissions.update', $user) }}" method="POST">
                        {{csrf_field()}} {{method_field('PUT')}}
                        @include('admin.permissions.checkboxes')
                        <button class="btn btn-primary btn-block">Atualizar Permissões</button>
                    </form>
                    @else
                        <ul class="list-group">
                            @forelse($user->permissions as $permission)
                                <li class="list-group-item">{{ $permission->name }}</li>
                            @empty
                                <li class="list-group-item">Não tem permissões</li>
                            @endforelse
                        </ul>
                    @endrole
                </div>
            </div>
        </div>
    </div>
@endsection
