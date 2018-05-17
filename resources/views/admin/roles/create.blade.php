@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Criar Papel</h3>
                </div>
                <div class="box-body">
                    @include('partials.error-messages')
                    <form action="{{ route('admin.roles.store') }}" method='POST'>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" name='name' value="{{ old('name') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Guard:</label>
                            <input type="text" name='guard_name' value="{{ old('guard_name') }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Permissões</label>
                            {{-- @include('admin.permissions.checkboxes') --}}
                        </div>
                        <button class="btn btn-primary btn-block">Criar papel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
