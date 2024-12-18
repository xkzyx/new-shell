<?php
$uploadDir = __DIR__ . '/uploads/';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    if ($file['error'] === UPLOAD_ERR_OK) {
        $fileName = basename($file['name']);
        $targetPath = $uploadDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            echo "Dosya başarıyla yüklendi: <a href='uploads/$fileName' target='_blank'>$fileName</a>";
        } else {
            echo "Dosya yüklenirken bir hata oluştu.";
        }
    } else {
        echo "Yükleme hatası: " . $file['error'];
    }
} else {
    echo "Lütfen bir dosya seçin.";
}
?>
<form method="POST" enctype="multipart/form-data">
    <label for="file">Dosyanızı seçin:</label>
    <input type="file" name="file" id="file" required>
    <button type="submit">Yükle</button>
</form>
