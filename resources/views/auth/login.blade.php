@include('includes.header')

<body>
    @include('includes.nav')

    @section('content')
    <div class="columns is-centered">
        <div class="column is-half">
            <h3 class="is-size-3 has-text-centered "> {{ __('Login') }} </h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="field">
                    <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                    <div class="control">
                        <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="icon is-small is-left" role="alert">
                            <i class="fas fa-envelope">{{ $message }}</i>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label for="password" class="label">{{ __('Password') }}</label>
                    <div class="control">
                        <input id="password" type="password" class="input @error('password') is-danger @enderror"
                            name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="icon is-small is-left" role="alert">
                            <i class="fas fa-envelope">{{ $message }}</i>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        {{-- <input class="input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        --}}
                        <label class="checkbox" for="remember">
                            <input type="checkbox">
                            {{ __('Remember Me') }} </label>
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button button-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                        <a class="button button-primary" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>


                </div>
        </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endsection
    @yield('content')

</body>

</html>