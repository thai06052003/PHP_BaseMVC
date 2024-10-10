<!DOCTYPE html>
<html lang="en">
<head>
    <title>ĐXT<?php echo !empty($page_title) ? ' - '.$page_title : ''; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Custom Css -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/clients/css/style.css">
</head>
<body>
    <?php
    $this->render('blocks/header', $sub_content);
    $this->render($content, $sub_content);
    $this->render('blocks/footer', $sub_content);
    ?>

    <script text="text/script" src="<?php echo _WEB_ROOT; ?>/public/assets/clients/js/script.js"></script>
</body>
</html>