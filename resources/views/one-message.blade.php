@extends('layouts.app')
@section('title-block'){{ $data->name }}@endsection

@section('content')

    <h4>Возможность отредактировать сообщение/удалить</h4>
    <div class="alert alert-info">
        <h5>{{ $data->name }}</h5>
        <p>{{ $data->email }}</p>
        <p>{{ $data->homepage }}</p>
        <p><small>{{ $data->created_at }}</small></p>
        <h6>{{ $data->message }}</h6>

        @if(Auth::user()->role === 'ROLE_ADMIN' || Auth::user()->id === $data->user_id)
            <a href="{{ route('message-update', $data->id) }}">
                <button class="btn btn-primary">Редактировать</button>
            </a>
            <a href="{{ route('message-delete', $data->id) }}">
                <button class="btn btn-danger">Удалить</button>
            </a>
        @endif
    </div>

@endsection

