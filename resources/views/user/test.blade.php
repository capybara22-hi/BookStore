<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="file">Chọn file:</label>
        <input type="file" name="file" id="file">
        <button type="submit">Upload</button>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $file = $_FILES['file'];

            echo "<h2>Thông tin file:</h2>";
            echo "<ul>";
            echo "<li><strong>Tên file:</strong> " . htmlspecialchars($file['name']) . "</li>";
            echo "<li><strong>Loại file:</strong> " . $file['type'] . "</li>";
            echo "<li><strong>Kích thước:</strong> " . $file['size'] . " bytes</li>";
            echo "<li><strong>Đã lưu tạm tại:</strong> " . $file['tmp_name'] . "</li>";
            echo "</ul>";

            // Nếu muốn lưu file vào thư mục "uploads"
            // $target = 'uploads/' . basename($file['name']);
            // if (move_uploaded_file($file['tmp_name'], $target)) {
            //     echo "<p>✅ File đã được lưu vào: <code>$target</code></p>";
            // } else {
            //     echo "<p>❌ Không thể lưu file.</p>";
            // }
        } else {
            echo "<p>Vui lòng chọn file để upload.</p>";
        }
    ?>

</body>
</html>