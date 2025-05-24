<?php

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

?>

<div class="col-12 bg-dark p-2 d-flex justify-content-center align-items-center">
    <div class="m-2">
        <a class="nav-link" href="index.php">Glavna</a>
    </div>

    <div class="m-2 d-flex">
        <?php if(isset($_SESSION['ulogovan'])): ?>
            <a class="nav-link" href="logout.php">Logout</a>
            <a class="nav-link" href="moja_korpa.php">Korpa</a>
        <?php else: ?>
            <a class="nav-link" href="login.php">Login</a>
        <?php endif; ?>   
    </div>

</div>