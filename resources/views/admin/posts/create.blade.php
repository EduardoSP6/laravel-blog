@extends('template')

@section('content')

    <h1>Create New Post</h1>

    {{-- mostra erros --}}
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endforeach
    @endif


    {{-- O comando Form::open cria um formulario já com a tag hidden da requisicao --}}

    {!! Form::open(['method' => 'post', 'route' => 'admin.posts.store']) !!}

    {{-- inclui os campos do formulario no arquivo _form.blade.php --}}
    @include('admin.posts._form')

    {{-- campo das tags --}}
    <div class="form-group">
        {!! Form::label('tags', 'Tags:') !!}
        {!! Form::text('tags', null, ['class' => 'form-control']) !!}
    </div>

    {{-- Botao criar post --}}
    <div class="form-group">
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}


@endsection