<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

    <?php require_once "html_delovi/navigacija.php" ?>
    
<div class="container d-flex justify-content-center mt-4">
    <form class="col-md-4 col-12" action="modeli/loginUser.php" method="POST">
        <div class="mb-3">
        <input class="form-control" type="email" name="email" placeholder="Uneiste vas email">
</div>
<div class="mb-3">
        <input class="form-control" type="password" name="password" placeholder="Unesite vasu lozinku">
</div>
        <button class="btn btn-primary w-100">Uloguj me</button>
    </form>

</body>
</div>
</html>