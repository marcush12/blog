@extends('admin.layout')
@section('header')
    <h1>
        Posts
        <small>Criar Posts</small>
    </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Início</a></li>
        <li><a href="{{route('admin.posts.index')}}"><i class="fa fa-list"></i> Posts</a></li>
        <li class="active">Criar</li>
      </ol>
@endsection
@section('content')
    <div class="row">
        <form action="{{ route('admin.posts.update', $post) }}"  method='POST'>
        {{ csrf_field() }} {{method_field('PUT')}}
            <div class="col-md-8">
                <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="">Título do Post</label>
                                <input name='title' type="text" class="form-control" value="{{old('title', $post->title)}}" placeholder="título do post">
                                {!!$errors->first('title','<span class="help-block">:message</span>' )!!}

                            </div>
                            <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                                <label for="">Conteúdo do Post</label>
                                <textarea name='body' id='editor' type="text" class="form-control" placeholder="conteúdo completo do post" rows='10'>{{old('body', $post->body)}}</textarea>
                                {!!$errors->first('body','<span class="help-block">:message</span>' )!!}
                            </div>
                        </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Data da publicação:</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input name='published_at' type="text" class="form-control pull-right" value="{{old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null)}}" id="datepicker" >
                            </div>
                        <!-- /.input group -->
                        </div>
                        <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                            <label for="">Categorias</label>
                            <select name="category" id="" class="form-control">
                                <option value="">Selecione uma categoria</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    "{{old('category, $post->category_id') == $category->id ? 'selected' : ''}}"
                                @endforeach
                            </select>
                            {!!$errors->first('category','<span class="help-block">:message</span>' )!!}
                        </div>
                        <div class="form-group">
                            <label for="">Tags</label>
                            <select name='tags[]'  class="form-control select2"
                                    multiple='multiple'
                                    data-placeholder="Selecione uma ou mais tags"  style="width: 100%;">
                              @foreach($tags as $tag)
                                <option {{collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : ''}} value="{{$tag->id}}">{{ $tag->name }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
                            <label for="">Excerto do Post</label>
                            <textarea name='excerpt' type="text" class="form-control" placeholder="trecho do post">{{ old('excerpt', $post->excerpt) }}</textarea>
                            {!!$errors->first('excerpt','<span class="help-block">:message</span>' )!!}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Salvar Post</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
@push('styles')
    <link rel="stylesheet" href="/adminlte/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
@endpush
@push('scripts')
    <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script>
            //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });
        $('.select2').select2();
        CKEDITOR.replace('editor');
    </script>
@endpush



