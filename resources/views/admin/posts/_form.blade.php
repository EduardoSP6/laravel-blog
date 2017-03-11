
    {{-- Campos do fomulario de cadastro e alteracao de Posts --}}

    {{-- titulo --}}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>

    {{-- Conteudo --}}
    <div class="form-group">
        {!! Form::label('content', 'Content:') !!}
        {!! Form::textarea('content', null, ['class'=>'form-control']) !!}
    </div>
