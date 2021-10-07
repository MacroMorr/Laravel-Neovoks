@extends('layouts.app')
@section('title-block', 'Результат поиска')

@section('search')
    @if(count($messages))
        <h1>Найдены сообщения</h1>
        @foreach($messages as $message)
            <div class="alert alert-info">
                <h5>{{ $message->name}}</h5>
                <p>{{ $message->email}}</p>
                <p>{{ $message->homepage }}</p>
                <p><small>{{ $message->created_at ?? '' }}</small></p>
                <h6>{{ $message->message}}</h6>
            </div>
        @endforeach

        {{ $messages->links() }}
    @elseif(count($messages))
        <p>Записи не найдены</p>
    @endif
@endsection
