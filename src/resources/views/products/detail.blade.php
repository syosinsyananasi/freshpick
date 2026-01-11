@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products/detail.css') }}">
@endsection

@section('content')
<div class="product-detail">
    <div class="product-detail__breadcrumb">
        <a href="/products" class="product-detail__breadcrumb-link">商品一覧</a>
        <span class="product-detail__breadcrumb-separator">&gt;</span>
        <span class="product-detail__breadcrumb-current">{{ $product->name }}</span>
    </div>

    <form action="/products/{{ $product->id }}/update" method="POST" enctype="multipart/form-data" class="product-detail__form">
        @csrf
        <div class="product-detail__content">
            <div class="product-detail__image-section">
                <div class="product-detail__image-wrapper">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-detail__image" id="preview-image">
                </div>
                <div class="product-detail__file-input">
                    <label class="product-detail__file-label">
                        <span class="product-detail__file-button">ファイルを選択</span>
                        <input type="file" name="image" class="product-detail__file" id="image-input" accept=".png,.jpeg,.jpg">
                    </label>
                    <span class="product-detail__file-name" id="file-name">{{ basename($product->image) }}</span>
                </div>
                @error('image')
                <p class="product-detail__error">{{ $message }}</p>
                @enderror
            </div>

            <div class="product-detail__info-section">
                <div class="product-detail__form-group">
                    <label class="product-detail__label">商品名</label>
                    <input type="text" name="name" class="product-detail__input" value="{{ old('name', $product->name) }}">
                    @error('name')
                    <p class="product-detail__error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="product-detail__form-group">
                    <label class="product-detail__label">値段</label>
                    <input type="text" name="price" class="product-detail__input" value="{{ old('price', $product->price) }}">
                    @error('price')
                    <p class="product-detail__error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="product-detail__form-group">
                    <label class="product-detail__label">季節</label>
                    <div class="product-detail__seasons">
                        @foreach($seasons as $season)
                        <label class="product-detail__season-label">
                            <input type="checkbox" name="seasons[]" value="{{ $season->id }}"
                                {{ in_array($season->id, old('seasons', $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }}>
                            {{ $season->name }}
                        </label>
                        @endforeach
                    </div>
                    @error('seasons')
                    <p class="product-detail__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="product-detail__description-section">
            <label class="product-detail__label">商品説明</label>
            <textarea name="description" class="product-detail__textarea">{{ old('description', $product->description) }}</textarea>
            @error('description')
            <p class="product-detail__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="product-detail__actions">
            <div class="product-detail__actions-center">
                <a href="/products" class="product-detail__back-btn">戻る</a>
                <button type="submit" class="product-detail__submit-btn">変更を保存</button>
            </div>
            <a href="/products/{{ $product->id }}/delete" class="product-detail__delete-btn" onclick="return confirm('本当に削除しますか？');">
                <svg class="product-detail__delete-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 6H16V5C16 3.897 15.103 3 14 3H10C8.897 3 8 3.897 8 5V6H5C4.447 6 4 6.447 4 7C4 7.553 4.447 8 5 8H6V19C6 20.103 6.897 21 8 21H16C17.103 21 18 20.103 18 19V8H19C19.553 8 20 7.553 20 7C20 6.447 19.553 6 19 6ZM10 5H14V6H10V5ZM16 19H8V8H16V19Z" fill="currentColor"/>
                    <path d="M10 10H11V17H10V10Z" fill="currentColor"/>
                    <path d="M13 10H14V17H13V10Z" fill="currentColor"/>
                </svg>
            </a>
        </div>
    </form>
</div>

<script>
document.getElementById('image-input').addEventListener('change', function(e) {
    var file = e.target.files[0];
    if (file) {
        document.getElementById('file-name').textContent = file.name;
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection
