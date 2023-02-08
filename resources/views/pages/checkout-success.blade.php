@extends("layout.layout")

@section("title", "Cart")

@section("content")
    <main class="main-only-title">
        <div class="main-only-title-desc">
            <h1>{{ __('Success')}}!</h1>

            <p>{{ __('We will contact you 1x24 hours!')}}</p>

            <a href="/home">{{ __("Click here to 'home'")}}</a>
        </div>
    </main>
@endsection
