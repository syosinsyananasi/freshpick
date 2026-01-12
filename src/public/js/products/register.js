// ファイルが選択された時の処理
document.getElementById('image-input').addEventListener('change', function(e) {
    var file = e.target.files[0];
    if (file) {
        document.getElementById('file-name').textContent = file.name;
        document.getElementById('preview-wrapper').style.display = 'block';
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
