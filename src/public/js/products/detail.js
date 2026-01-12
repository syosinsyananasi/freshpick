// ファイル選択ボタンをクリックした時の処理
document.querySelector('.product-detail__file-button').addEventListener('click', function() {
    // 既存の画像とファイル名を非表示にする
    document.getElementById('image-wrapper').style.display = 'none';
    document.getElementById('file-name').style.display = 'none';
    // delete_imageフラグを'1'に設定
    document.getElementById('delete-image-flag').value = '1';
});

// ファイルが選択された時の処理
document.getElementById('image-input').addEventListener('change', function(e) {
    var file = e.target.files[0];
    if (file) {
        document.getElementById('file-name').textContent = file.name;
        document.getElementById('file-name').style.display = 'inline';
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
            document.getElementById('image-wrapper').style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});
