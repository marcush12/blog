@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Atualizar Permissão</h3>
                </div>
                <div class="box-body">
                    @include('partials.error-messages')
                    <form action="{{ route('admin.permissions.update', $permission) }}" method='POST'>
                        {{method_field('PUT')}} {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Identificador:</label>
                            <input type="text" name='display_name' value="{{$permission->name }}" class="form-control" disable>
                        </div>
                        <div class="form-group">
                            <label for="display_name">Nome:</label>
                            <input type="text" name='display_name' value="{{ old('display_name', $permission->display_name) }}" class="form-control">
                        </div>
                        <button class="btn btn-primary btn-block">Atualizar Permissão</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


