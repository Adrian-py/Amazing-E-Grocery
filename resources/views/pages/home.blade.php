@extends("layout.layout")

@section("title", "Home")

@section("content")
    <main>
        <div class="list">
            @foreach ($item_list as $item)
                <div class="list__items">
                    <img src="/assets/vegetable.jpeg" alt="{{$item->item_name}} picture" class="list__items__image">

                    <p class="list__items__name">{{ $item->item_name }}</p>
                    <a href="/product/{{ $item->item_slug }}" class="list__items__link">Detail</a>
                </div>
            @endforeach
        </div>

        <div class="pagination">
            <a href="{{ $item_list->previousPageUrl() }}" class="pagination__direction">{{ __('Previous')}}</a>
            <div class="pagination__pages">
                @if($item_list->currentPage() > 6)
                    @for($i = 1; $i <= 3; $i++)
                        <a class="pagination__page-link" href="{{ $item_list->url($i) }}">{{ $i }}</a>
                    @endfor
                    <p>...</p>
                @endif

                @for($i = $item_list->currentPage()-3; $i < $item_list->currentPage(); $i++)
                    @if($i >0)
                        <a class="pagination__page-link" href="{{ $item_list->url($i) }}">{{ $i }}</a>
                    @endif
                @endfor

                @for($i = $item_list->currentPage(); $i <= $item_list->lastPage() && $i<=$item_list->currentPage()+3; $i++)
                    <a class="pagination__page-link" href="{{ $item_list->url($i) }}">{{ $i }}</a>
                @endfor
            </div>
            <a href="{{ $item_list->nextPageUrl() }}" class="pagination__direction">{{ __('Next')}}</a>
        </div>
    </main>
@endsection
