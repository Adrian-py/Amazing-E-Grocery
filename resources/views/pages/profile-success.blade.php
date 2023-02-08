@extends("layout.layout")

@section("title", "Cart")

@section("content")
    <main class="main-only-title">
        <div class="main-only-title-desc">
            <h1>{{ __('Saved!')}}</h1>

            <a href="/home">{{ __("Click here to 'home'")}}</a>
        </div>
    </main>
@endsection
