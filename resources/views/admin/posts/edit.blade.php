@extends('template')

@section('content')

    <h1>Edit Post</h1>

    {{-- mostra erros --}}
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endforeach
    @endif


    {{-- O comando Form:model cria um formulario passando o objeto post para popular os campos --}}

    {!! Form::model($post, ['method' => 'put', 'route' => ['admin.posts.update', $post->id]]) !!}

    {{-- inclui os campos do formulario no arquivo _form.blade.php --}}
    @include('admin.posts._form')

    {{-- campo das tags --}}
    <div class="form-group">
        {!! Form::label('tags', 'Tags:') !!}
        {!! Form::text('tags', $post->tagList, ['class' => 'form-control']) !!}
    </div>

    {{-- Botao criar post --}}
    <div class="form-group">
        {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}



@endsection