@extends('cms.adminlte')

@if(isset($tag))
    @section('h1', 'Редактирование тега')
@else
    @section('h1', 'Добавление тега')
@endif

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <!-- form start -->
        @if(isset($tag))
            {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'patch']) !!}
        @else
            {!! Form::open(['method' => 'POST', 'route' => 'tags.store']) !!}
        @endif
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('name', 'Название') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('tags.index') }}" class="btn btn-default">Отмена</a>
                {!! Form::submit('Сохранить', ['class' => 'btn btn-primary float-right']) !!}
            </div>
            <!-- /.card-footer -->
        {!! Form::close() !!}
    </div>
@endsection
