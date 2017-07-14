<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maps</title>
    <link href="map_styles.css" rel="stylesheet">
    <script>
        function resizeIframe(obj) {
            obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
        }
    </script>
</head>
<body>
<iframe src="http://localhost:8085/Mapcreator/index.php" frameborder="0" scrolling="no" onload="resizeIframe(this)" class="map"/>

</body>
</html>