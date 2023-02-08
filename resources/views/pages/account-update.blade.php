@extends("layout.layout")

@section("title", "Cart")

@section("content")
    <main class="update-profile">
        <h1>{{ $account->first_name }} {{ $account->last_name }}</h1>
        <form action="/update-profile/{{ $account->id }}" method="POST" class="update-profile__form">
            @csrf
            <label for="role">Role:</label>
            <select name="role" id="role">
                <option value="user" @if($account->role->role_name === "user")selected="selected"@endif>User</option>
                <option value="admin" @if($account->role->role_name === "admin")selected="selected"@endif>Admin</option>
            </select>

            <input type="submit" value="Save">
        </form>
    </main>
@endsection
