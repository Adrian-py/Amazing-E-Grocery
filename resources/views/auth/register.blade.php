@extends("layout.layout")

@section("title", "Register")

@section("content")
    <main class="form">
        <h1 class="form__title">{{ __('Register')}}</h1>

        <form action="/register" method="POST" class="form__container" enctype="multipart/form-data">
            @csrf
            <div class="form__field">
                <label for="first_name">{{ __('First Name')}}:</label>
                <input required type="text" name="first_name" id="first_name" value="{{ old('first_name') }}">

                @error("first_name")
                    <span class="">{{ $message }}</span>
                @enderror
            </div>

            <div class="form__field">
                <label for="last_name">{{ __('Last Name')}}:</label>
                <input required type="text" name="last_name" id="last_name" value="{{ old('email') }}">

                @error("last_name")
                    <span class="">{{ $message }}</span>
                @enderror
            </div>

            <div class="form__field">
                <label for="email">{{ __('Email Address')}}:</label>
                <input required type="email" name="email" id="email" value="{{ old('email') }}">

                @error("email")
                    <span class="">{{ $message }}</span>
                @enderror
            </div>

            <div class="form__field">
                <label for="role">Role</label>
                <select required name="role" id="role">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>

                @error("role")
                    <span class="">{{ $message }}</span>
                @enderror
            </div>

            <div class="form__field">
                <div class="">
                    <label for="gender">{{ __('Gender')}}:</label>
                    <div class="">
                        <input type="radio" name="gender" id="male" value="male">
                        <label for="male">{{ __('Male')}}</label>
                    </div>

                    <div class="">
                        <input type="radio" name="gender" id="female" value="female">
                        <label for="gender">{{ __('Female')}}</label>
                    </div>
                </div>

                @error("gender")
                    <span class="">{{ $message }}</span>
                @enderror
            </div>

            <div class="form__field">
                <label for="display_picture">{{ __('Display Picture')}}:</label>
                <input required type="file" name="display_picture" id="display_picture">

                @error("display_picture")
                    <span class="">{{ $message }}</span>
                @enderror
            </div>

            <div class="form__field">
                <label for="password">Password:</label>
                <input required type="password" name="password" id="password">

                @error("password")
                    <span class="">{{ $message }}</span>
                @enderror
            </div>

            <div class="form__field">
                <label for="password_confirmation">{{ __('Confirm Password')}}:</label>
                <input required type="password" name="password_confirmation" id="confirm-password">

                @error("password_confirmation")
                    <span class="">{{ $message }}</span>
                @enderror
            </div>

            <input type="submit" value="Submit" class="form__button">
        </form>
        <a href="/login" class="form__reminder">{{ __('Already have an account? Click here to login')}}</a>
    </main>
@endsection
