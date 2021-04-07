@extends('cms.adminlte')

@section('h1', 'Просмотр статьи')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $news->title }}</h3>
            <div class="card-tools">
                Created At: {{ date('M j, Y h:ia', strtotime($news->created_at)) }},
                Last Updated: {{ date('M j, Y h:ia', strtotime($news->updated_at)) }}
            </div>
        </div>
        <div class="card-body">
            {{ $news->content }}
            @if(!empty($news->category))
                <p>Category: {{ $news->category }}</p>
            @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            {!! Form::open(['route' => ['news.destroy', $news->id], 'method' => 'DELETE']) !!}
            {!! Form::submit('Удалить', ['class' => 'btn btn-danger float-right']) !!}
            {!! Form::close() !!}
            {{ Html::linkRoute('news.index', '<< Вернуться в список статей', array(), ['class' => 'btn btn-default']) }}
        </div>
        <!-- /.card-footer-->
    </div>
@endsection
