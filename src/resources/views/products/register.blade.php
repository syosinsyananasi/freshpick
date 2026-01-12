@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products/register.css') }}">
@endsection

@section('js')
<script src="{{ asset('js/products/register.js') }}"></script>
@endsection

@section('content')
<div class="product-register">
    <h1 class="product-register__title">商品登録</h1>

    <form action="/products/register" method="POST" enctype="multipart/form-data" class="product-register__form">
        @csrf
        <div class="product-register__form-group">
            <label class="product-register__label">
                商品名
                <span class="product-register__required">必須</span>
            </label>
            <input type="text" name="name" class="product-register__input" placeholder="商品名を入力" value="{{ old('name') }}">
            @error('name')
            <p class="product-register__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="product-register__form-group">
            <label class="product-register__label">
                値段
                <span class="product-register__required">必須</span>
            </label>
            <input type="text" name="price" class="product-register__input" placeholder="値段を入力" value="{{ old('price') }}">
            @error('price')
            <p class="product-register__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="product-register__form-group">
            <label class="product-register__label">
                商品画像
                <span class="product-register__required">必須</span>
            </label>
            <div class="product-register__file-wrapper">
                <label class="product-register__file-label">
                    <span class="product-register__file-button">ファイルを選択</span>
                    <input type="file" name="image" class="product-register__file" id="image-input" accept=".png,.jpeg,.jpg">
                </label>
                <span class="product-register__file-name" id="file-name"></span>
            </div>
            <div class="product-register__preview" id="preview-wrapper" style="display: none;">
                <img src="" alt="プレビュー" class="product-register__preview-image" id="preview-image">
            </div>
            @error('image')
            <p class="product-register__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="product-register__form-group">
            <label class="product-register__label">
                季節
                <span class="product-register__required">必須</span>
                <span class="product-register__note">複数選択可</span>
            </label>
            <div class="product-register__seasons">
                @foreach($seasons as $season)
                <label class="product-register__season-label">
                    <input type="checkbox" name="seasons[]" value="{{ $season->id }}"
                        {{ in_array($season->id, old('seasons', [])) ? 'checked' : '' }}>
                    {{ $season->name }}
                </label>
                @endforeach
            </div>
            @error('seasons')
            <p class="product-register__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="product-register__form-group">
            <label class="product-register__label">
                商品説明
                <span class="product-register__required">必須</span>
            </label>
            <textarea name="description" class="product-register__textarea" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
            @error('description')
            <p class="product-register__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="product-register__actions">
            <a href="/products" class="product-register__back-btn">戻る</a>
            <button type="submit" class="product-register__submit-btn">登録</button>
        </div>
    </form>
</div>
@endsection
