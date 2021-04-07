@extends('cms.adminlte')

@if(isset($user))
    @section('h1', 'Редактирование пользователя')
@else
    @section('h1', 'Добавление пользователя')
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
        @if(isset($user))
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}
        @else
            {!! Form::open(['method' => 'POST', 'route' => 'users.store']) !!}
        @endif
            <div class="card-body">

                <div class="form-group">
                    {!! Form::label('name', 'Имя') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Пароль') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    @if($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('users.index') }}" class="btn btn-default">Отмена</a>
                {!! Form::submit('Сохранить', ['class' => 'btn btn-primary float-right']) !!}
            </div>
            <!-- /.card-footer -->
        {!! Form::close() !!}
    </div>
@endsection
