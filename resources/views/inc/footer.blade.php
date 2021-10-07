@stack('scripts')
<div style="width: 100%; margin: 0 auto 0 auto;">
<footer class="card-footer mt-auto py-3 bg-light fixed-bottom" id="footer">
    <div class="container">
        <span class="text-muted">
            <span>Пользователь: @guest
                <span style="color: #7c3636">не авторизован</span>
            @else
                <span style="color: #2a7e2a; ">
                    {{ Auth::user()->name }}
                </span>
            @endauth
    </div>
</footer>
</div>

