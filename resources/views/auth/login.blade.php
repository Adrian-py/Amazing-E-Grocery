@extends("layout.layout")

@section("title", "Login")

@section("content")
    <main class="form">
        <h1 class="form__title">Login</h1>
        @if(session("invalid"))
            <p class="form__warning">{{ session("invalid") }}</p>
        @endif

        @if(session("register-success"))
        <p class="form__success">{{ session("register-success") }}</p>
        @endif


        <form action="/login" method="POST" class="form__container">
            @csrf
            <div class="form__field">
                <label class="form__label" for="email">{{ __('Email Address')}}:</label>
                <input class="form__input" required type="email" name="email" id="email" value="{{ old('email') }}">

                @error("email")
                <span class="">{{ $message }}</span>
                @enderror
            </div>

            <div class="form__field">
                <label class="form__label" for="password">Password:</label>
                <input class="form__input" required type="password" name="password" id="password">

                @error("password")
                    <span class="">{{ $message }}</span>
                    @enderror
                </div>

                <input type="submit" value="Submit" class="form__button">
            </form>
            <a href="/register" class="form__reminder">{{ __('Dont have an account yet?')}}?</a>
        </main>
@endsection
