@include('includes.header')

<body>
    @include('includes.nav')

    @section('content')
    <div class="columns is-centered has-background-link main-register">
        <div class="column is-half has-background-success">
            <h3 class="is-size-2 has-text-centered has-text-light has-text-weight-bold"> {{ __('Регистрация') }} </h3>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="field">
                    <label for="name" class="label">{{ __('Имя') }}</label>

                    <div class="control">
                        <input id="name" type="text" class="input @error('name') is-danger @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <p class="help is-danger" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="email" class="label">{{ __('E-Mail адрес') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="input @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="label">{{ __('Пароль') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="input @error('password') is-danger @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="password-confirm" class="label">{{ __('Подтвеждение пароля') }}</label>

                    <div class="control">
                        <input id="password-confirm" type="password" class="input" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button button-primary is-pulled-right">
                            {{ __('Register') }}
                        </button>
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
    <style>
        .main-register{
            height: 94vh;
        }

    </style>
</body>

</html>