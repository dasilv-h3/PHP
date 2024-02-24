<header class="navbar navbar-expand-lg d-flex justify-content-center bg-white fixed-top">
<nav class="nav">
<?php if(isset($_SESSION["user_id"])): ?>
            <a class="nav-link" href="/logout">Logout</a>
            <a class="nav-link" href="/profile">Profile</a>

        <?php else: ?>
            <a class="nav-link" href="/login">Login</a>
            <a class="nav-link" href="/register">Register</a>
        <?php endif; ?>
</nav>
</header>