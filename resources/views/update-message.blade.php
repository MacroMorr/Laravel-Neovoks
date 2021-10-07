@extends('layouts.app')
@section('title-block')Редактирование записи@endsection

@section('content')
    <h1>Редактирование записи</h1>

    <form action="{{  route('message-update-submit', $data->id)  }}" method="post">
        @csrf
        <div class="form-group mt-2">
            <label for="name">Ваше Имя</label>
            <input type="text" name="name" value="{{ $data->name }}" placeholder="Введите имя" id="name" class="form-control">
        </div>

        <div class="form-group mt-2">
            <label for="name">E-mail</label>
            <input type="email" name="email" value="{{ $data->email }}" placeholder="Введите E-mail" id="email" class="form-control">
        </div>

        <div class="form-group mt-2">
            <label for="name">Home page</label>
            <input type="url" name="homepage" value="{{ $data->homepage }}" placeholder="Введите домашнюю страницу" id="homepage" class="form-control">
        </div>

        <div class="form-group mt-2">
            <label for="message">Сообщение</label>
            <textarea name="message" id="message"  cols="10" rows="5" class="form-control" placeholder="Введите сообщение">{{ $data->message }}"</textarea>
        </div>

        <button type="submit" class="btn btn-success mt-2">Обновить</button>

    </form>
@endsection
