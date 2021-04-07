@extends('cms.adminlte')

@section('h1', 'Пользователи')

@section('content')
    <div class="row mb-3 mt-n5">
        <div class="col col-sm-12">
            <a href="{!! route('users.create') !!}" class="btn btn-info float-right"><i class="fas fa-user-plus"></i> добавить пользователя</a>
        </div>
    </div>

    @if($users->count() === 0)
    <div class="alert alert-info">
        <i class="icon fas fa-info"></i> Пользователей нет!
    </div>
    @else
    <div class="card">
        <div class="card-body p-0">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 10px">ID</th>
                    <th>Название</th>
                    <th style="width: 230px"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td class="text-right">
                        <form method="post" action="{!! route('users.destroy', [$user->id]) !!}">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button class="btn btn-xs btn-danger float-right delete-btn" type="submit" data-toggle="modal" data-target="#modal-delete-item" data-message="Удалить пользователя <b>{{ $user->name }}</b> [{{ $user->id }}]?"><i class="fas fa-trash"></i> удалить</button>
                        </form>
                        <a class="btn btn-default btn-xs float-right mr-2" href="{!! route('users.edit', [$user->id]) !!}"><i class="fas fa-pencil-alt"></i> редактировать</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="modal fade" id="modal-delete-item">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Удалить пользователя?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="modal-delete-item-text">Удалить пользователя?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-primary confirm_action">Удалить</button>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
