@foreach($permissions as $id=>$name)
    <div class="checkbox">
        <label for="">
            <input name="permissions[]" type="checkbox" value="{{ $name }}"
            {{$model->permissions->contains($id) || collect(old('permissions'))->contains($name) ? 'checked' : ''}} >
            {{-- usou model (genérico) para não usar user q causa erro; vai atribuir mode=>role ou model=>user --}}
            {{ $name }}
        </label>
    </div>
@endforeach
