@extends('layouts.app')
@section('title-block')Все Сообщения@endsection

@section('content')
    <form method="get" action="{{ route('search') }}" class="container">
        <div class="from-row row">
            <div class="form-group col-md-10">
                <input type="text" class="form-control" id="search" name="search" placeholder="search">
            </div>
            <div class="form-group col-md-2">
                <button type="submit" class="btn btn-dark btn-block">Поиск</button>
            </div>
        </div>
    </form>

    <h1>Ваши сообщения</h1>
    @foreach($messages as $message)
        <div class="alert alert-info">
            <h5>{{ $message->name }}</h5>
            <p>{{ $message->email }}</p>
            <p>{{ $message->homepage }}</p>
            <p><small>{{ $message->created_at }}</small></p>
            <h6>{{ $message->message }}</h6>
            <a href="{{ route('message-data-one', $message->id) }}">
                <button class="btn btn-success">Детальнее</button>
            </a>
        </div>
    @endforeach
    {{ $messages->links() }}
@endsection

