<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $this->e($title) ?></title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
    <div id="header">
        <?php echo $this->insert('partials/header') ?>
    </div>
    <div class="container">
        <?= $this->section('content') ?>
    </div>
</body>
</html>