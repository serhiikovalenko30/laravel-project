@extends('cms.adminlte')

@if(isset($category))
    @section('h1', 'Редактирование категории')
@else
    @section('h1', 'Добавление категории')
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
        @if(isset($category))
            {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'patch']) !!}
        @else
            {!! Form::open(['method' => 'POST', 'route' => 'categories.store']) !!}
        @endif
        <div class="card-body">
                <div class="form-group">
                    {!! Form::label('name', 'Название') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            {!! $categories !!}
            <div class="form-group">
                {!! Form::label('parent_id', 'Родитель') !!}
                {!! Form::select('parent_id', $categories, old('parent_id') ?? '', ['class' => 'form-control']) !!}
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('categories.index') }}" class="btn btn-default">Отмена</a>
                {!! Form::submit('Сохранить', ['class' => 'btn btn-primary float-right']) !!}
            </div>
            <!-- /.card-footer -->
        {!! Form::close() !!}
    </div>
@endsection
