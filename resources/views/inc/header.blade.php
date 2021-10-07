<div style="width: 100%; margin: auto;">

    <div class="header d-flex flex-column flex-md-row align-items-center pb-4 mb-4 border-bottom">
        <div style="position: relative; margin: 20px 0 0 100px;">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <h4>Logo</h4>
            </a>
        </div>

        <div style="position:absolute; right: 0; margin: 20px 0 0 0; width: 400px;">
            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                <a class="me-3 py-2 text-dark text-decoration-none" href="{{route('home')}}">Главная</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="{{route('message')}}">Сообщения</a>

                    @guest
                        <a class="me-3 py-2 text-dark text-decoration-none" href="{{route('login')}}">log</a>
                        <a class="me-3 py-2 text-dark text-decoration-none" href="{{route('register')}}">Регистрация</a>
                    @else
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                            <div style="margin-top: 2px">
                                <a class="me-3 py-2  text-dark text-decoration-none" href="{{route('contact')}}">Контакт</a>
                                <input class="me-5 btn btn-dark" type="submit" value="Выход">
                            </div>
                        </form>
                    @endguest
            </nav>
        </div>
    </div>
</div>
