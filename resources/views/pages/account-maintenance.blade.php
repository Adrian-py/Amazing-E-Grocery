@extends("layout.layout")

@section("title", "Cart")

@section("content")
    <main class="account-maintenance">
        <table class="account-maintenance__table">
            <tr>
                <th>{{ __('Account')}}</th>
                <th>{{ __('Action')}}</th>
            </tr>
            @foreach ($accounts as $account)
                <tr>
                    <td class="account-maintenance__name">{{ $account->first_name }} - {{ $account->role->role_name }}</td>
                    <td class="account-maintenance__action">
                        <a href="/update-profile/{{ $account->id }}">{{ __('Update Profile')}}</a>
                        <form action="/delete-account/{{ $account->id }}" method="POST">
                            @csrf
                            <input type="submit" value="{{ __('delete')}}" class="account-maintenance__delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </main>
@endsection
