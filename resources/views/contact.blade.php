@extends('layouts.app')
@section('title-block')Контактная форма@endsection

@section('contact')
    <h1>Контактная форма</h1>

    <form action="{{  route('contact-form')  }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-2">
            <label for="name">Ваше Имя</label>
            <input type="text" name="name" placeholder="Введите имя" id="name" class="form-control">
        </div>

        <div class="form-group mt-2">
            <label for="name">E-mail</label>
            <input type="email" name="email" placeholder="Введите E-mail" id="email" class="form-control">
        </div>

        <div class="form-group mt-2">
            <label for="name">Home page</label>
            <input type="url" name="homepage" placeholder="Введите домашнюю страницу" id="homepage" class="form-control">
        </div>

        <div class="form-group mt-2">
            <label for="message">Сообщение</label>
            <textarea name="message" id="message" cols="10" rows="5" class="form-control" placeholder="Введите сообщение"></textarea>
        </div>

        <button type="submit" class="btn btn-success mt-2">Отправить</button>

    </form>
@endsection
