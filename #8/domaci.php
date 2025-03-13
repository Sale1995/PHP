<?php

    $navigacija = [
        "Glavna" => "index.php",
        "O nama" => "about_us.php",
        "Kontakt" => "contact.php"
    ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php foreach($navigacija as $stranica => $url): ?>
        <a href="<?php echo $url ?>"><?php echo $stranica ?></a>
    <?php endforeach; ?>

</body>
</html>
