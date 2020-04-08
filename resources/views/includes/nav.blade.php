<nav class="navbar has-background-black-ter" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item has-text-white is-size-4" href="/">
      TODO
    </a>
    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  <div class="navbar-menu">
    <div class="navbar-start">
      @if (Auth::check())
      <button type="button" class="button is-primary">
        <!-- если пользователь зарегистрирован, тогда ->отобразить его имя -->
        {{{ Auth::user()->name}}}
      </button>
      @else
      <!-- в другом случае -->
      <a class="navbar-item has-text-danger" href="{{route('register')}}">Регистрация</a>
      <a class="navbar-item has-text-danger" href="{{route('login')}}">Войти</a>
      @endif
      @if (Auth::check())
      <!-- если зарегистрирован, тогда нам нужно показать как выйти -->
      <!-- это можно сделать через форму -->

      <a class="navbar-item has-text-danger" href="{{url('/logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
        Выйти </a>
      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>

      @endif
      </ul>
    </div>

    <div class="navbar-end">
      <!-- navbar items -->
    </div>
  </div>
</nav>