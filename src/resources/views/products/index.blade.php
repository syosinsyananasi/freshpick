@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products/index.css') }}">
@endsection

@section('content')
<div class="products">
    <div class="products__header">
        <h1 class="products__title">
            @if(isset($keyword) && $keyword)
                "{{ $keyword }}"の商品一覧
            @else
                商品一覧
            @endif
        </h1>
        <a href="/products/register" class="products__add-btn">+ 商品を追加</a>
    </div>

    <div class="products__content">
        <div class="products__sidebar">
            <form action="/products/search" method="GET" class="search-form">
                <input type="text" name="keyword" class="search-form__input" placeholder="商品名で検索" value="{{ $keyword ?? '' }}">
                <button type="submit" class="search-form__button">検索</button>

                <div class="search-form__sort">
                    <p class="search-form__sort-label">価格順で表示</p>
                    <select name="sort" class="search-form__select">
                        <option value="">価格で並び替え</option>
                        <option value="high" {{ (isset($sort) && $sort === 'high') ? 'selected' : '' }}>高い順に表示</option>
                        <option value="low" {{ (isset($sort) && $sort === 'low') ? 'selected' : '' }}>低い順に表示</option>
                    </select>
                </div>

                @if(isset($sort) && $sort)
                <div class="sort-modal">
                    <span class="sort-modal__text">{{ $sort === 'high' ? '高い順に表示' : '低い順に表示' }}</span>
                    <a href="/products" class="sort-modal__close">&times;</a>
                </div>
                @endif
            </form>
        </div>

        <div class="products__grid">
            @foreach($products as $product)
            <a href="/products/detail/{{ $product->id }}" class="product-card">
                <div class="product-card__image-wrapper">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-card__image">
                </div>
                <div class="product-card__info">
                    <p class="product-card__name">{{ $product->name }}</p>
                    <p class="product-card__price">&yen;{{ $product->price }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    <div class="products__pagination">
        {{ $products->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection
