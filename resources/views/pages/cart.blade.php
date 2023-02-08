@extends("layout.layout")

@section("title", "Cart")

@section("content")
    <main class="cart">
        <h1 class="cart__title">{{ __('Cart')}}</h1>

        <div class="cart__list">
            @foreach ($cart_items as $item)
                <div class="cart__list__item">
                    <img src="/assets/vegetable.jpeg" alt="{{ $item->item_name }} picture" class="cart__image">

                    <p class="cart__name">{{ $item->item->item_name }}</p>

                    <p class="cart__price">Rp. {{ number_format($item->price) }}</p>

                    <form action="/remove-item/{{ $item->id }}" method="POST">
                        @csrf
                        <button type="submit" class="cart__delete">{{ __('Delete')}}</button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="cart__options">
            <p class="cart__total">TOTAL: Rp. {{ number_format($total_price) }}</p>

            <form action="/checkout" method="POST">
                @csrf
                <button type="submit" class="cart__checkout">Check Out</button>
            </form>
        </div>
    </main>
@endsection
