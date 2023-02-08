@extends("layout.layout")

@section("title", $item_detail->item_name)

@section("content")
    <main class="detail">
        <h1 class="detail__title">{{ $item_detail->item_name }}</h1>
        <div class="detail__container">
            <img src="/assets/vegetable.jpeg" alt="{{ $item_detail->item_name }} picture" class="detail__image">

            <div class="detail__desc">
                <p class="detail__price">Price: Rp. {{ number_format($item_detail->price) }}</p>

                <p class="detail__description">{{ $item_detail->item_desc }}</p>
            </div>

            <form action="/product-buy/{{ $item_detail->item_slug }}" method="POST" class="detail__buy__container">
                @csrf
                <button type="submit" class="detail__buy">{{ __('Buy')}}</button>
            </form>
        </div>
    </main>
@endsection
