<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action="{{ route('admin.posts.store') }}"  method='POST'>
  {{ csrf_field() }}
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Escreva o nome de seu novo post</h4>
        </div>
        <div class="modal-body">
          <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            {{-- <label for="">Título do Post</label> --}}
            <input name='title' type="text" class="form-control" value="{{old('title')}}" placeholder="título do post" required>
            {!!$errors->first('title','<span class="help-block">:message</span>' )!!}
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button class="btn btn-primary">Criar Post</button>
        </div>
      </div>
    </div>
  </form>
</div>
