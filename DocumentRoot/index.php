<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to <?php echo $_SERVER['NAME_ENV']; ?></h1>
    <pre>
        <?php var_dump($_SERVER); ?>
    </pre>
</body>
</html>