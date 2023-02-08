@extends("layout.layout")

@section("title", "Cart")

@section("content")
    <main class="profile">
        <img src="/storage/images{{ $account->display_picture_link }}" alt="{{ $account->first_name }}'s profile picture" class="profile__picture">

        <form action="/profile" method="POST" enctype="multipart/form-data" class="profile__form">
            @csrf
            <div class="profile__form__field">
                <label for="first_name">{{ __('First Name')}}:</label>
                <input required type="text" name="first_name" id="first_name" value="{{ $account->first_name }}">

                @error("first_name")
                    <span class="">{{ $message }}</span>
                @enderror
            </div>

            <div class="profile__form__field">
                <label for="last_name">{{ __('Last Name')}}:</label>
                <input required type="text" name="last_name" id="last_name" value="{{ $account->last_name }}">

                @error("last_name")
                    <span class="">{{ $message }}</span>
                @enderror
            </div>

            <div class="profile__form__field">
                <label for="email">{{ __('Email Address')}}:</label>
                <input required type="email" name="email" id="email" value="{{ $account->email }}">

                @error("email")
                    <span class="">{{ $message }}</span>
                @enderror
            </div>

            <div class="profile__form__field">
                <label for="role">Role</label>
                <select required name="role" id="role">
                    <option value="user" @if($account->role->role_name === "user")selected="selected"@endif>User</option>
                    <option value="admin" @if($account->role->role_name === "admin")selected="selected"@endif>Admin</option>
                </select>

                @error("role")
                    <span class="">{{ $message }}</span>
                @enderror
            </div>

            <div class="profile__form__field">
                <div class="">
                    <label for="gender">{{ __('Gender')}}:</label>
                    <div class="">
                        <input type="radio" name="gender" id="male" value="male" @if($account->gender->gender_desc === "male")checked="checked"@endif>
                        <label for="male">{{ __('Male')}}</label>
                    </div>

                    <div class="">
                        <input type="radio" name="gender" id="female" value="female" @if($account->gender->gender_desc === "female")checked="checked"@endif>
                        <label for="gender">{{ __('Female')}}</label>
                    </div>
                </div>

                @error("gender")
                    <span class="">{{ $message }}</span>
                @enderror
            </div>

            <div class="profile__form__field">
                <label for="display_picture">{{ __('Display Picture')}}:</label>
                <input type="file" name="display_picture" id="display_picture">

                @error("display_picture")
                    <span class="">{{ $message }}</span>
                @enderror
            </div>

            <div class="profile__form__field">
                <label for="password">Password:</label>
                <input required type="password" name="password" id="password" value="{{ $account->password }}">

                @error("password")
                    <span class="">{{ $message }}</span>
                @enderror
            </div>

            <div class="profile__form__field">
                <label for="password_confirmation">Confirm Password:</label>
                <input required type="password" name="password_confirmation" id="confirm-password" value="{{ $account->password }}">

                @error("password_confirmation")
                    <span class="">{{ $message }}</span>
                @enderror
            </div>

            <input type="submit" value="{{ __('Save')}}" class="profile__submit">
        </form>
    </main>
@endsection
