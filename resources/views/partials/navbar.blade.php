<nav>
    <div class="nav__top">
        <h1 class="title">Amazing E-Grocery</h1>

        @guest
        <div class="nav__top__side">
            <a href="/login" class="nav__button">Login</a>
            <a href="/register" class="nav__button">{{ __('Register')}}</a>
        </div>
        @endguest

        @auth
            <div class="nav__top__side">
                {{-- Change language --}}
                @if(session("loc") === "id")
                    <a href="/lang/en" class="change-language">Ubah bahasa ke EN</a>
                @else
                    <a href="/lang/id" class="change-language">Change Language to ID</a>
                @endif

                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="nav__logout">{{ __('Logout')}}</button>
                </form>
            </div>
        @endauth
    </div>

    @auth
        <ul class="nav__bottom">
            <li><a href="/home">{{ __('Home')}}</a></li>
            <li><a href="/cart">{{ __('Cart')}}</a></li>
            <li><a href="/profile">{{ __('Profile')}}</a></li>

            @if(Auth::user()->role->role_name === "admin")
                <li><a href="/account-maintenance">{{ __('Account Maintenance')}}</a></li>
            @endif
        </ul>
    @endauth
</nav>
