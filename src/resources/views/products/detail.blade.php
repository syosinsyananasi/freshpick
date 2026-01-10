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
                        <span class="product-detail__file-name" id="file-name"></span>
                    </label>
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
            <a href="/products" class="product-detail__back-btn">戻る</a>
            <button type="submit" class="product-detail__submit-btn">変更を保存</button>
            <a href="/products/{{ $product->id }}/delete" class="product-detail__delete-btn" onclick="return confirm('本当に削除しますか？');">
                <span class="product-detail__delete-icon">&#128465;</span>
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
