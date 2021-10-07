<nav class="navbar navbar-expand-lg navbar-fixed-top navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php
        echo "<div class='collapse navbar-collapse' id='navbarNav'>
            <ul class='navbar-nav'>
                <li class='nav-item'>
                    <a class='nav-link' href='". URL_ROOT . "index.php'>Login</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='". URL_ROOT . "index.php?page=registrations'>Registrations</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='". URL_ROOT . "index.php?page=events'>Events</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='". URL_ROOT . "index.php?page=manager'>Manager</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='". URL_ROOT . "index.php?page=admin'>Admin</a>
                </li>
            </ul>
        </div>"
    ?>
</nav>


<!-- <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/app/view/pages/login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href='". URL_ROOT . "index.php?page=registrations"'>Registrations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/app/view/pages/events.php">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/app/view/pages/manager.php">Manager</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/app/view/pages/admin.php">Admin</a>
            </li>
        </ul>
    </div> -->