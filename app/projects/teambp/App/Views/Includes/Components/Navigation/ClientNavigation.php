<?php


use Models\Core\App\Utilities\Url;


?>
<nav class="navbar navbar-expand-sm navbar-light bg-transparent">
    <a class="navbar-brand" href="">
        <img src="<?php echo Url::GetReference("resources/assets/icons/teambp(WebLogo).svg") ?>"
            class="mx-4 mt-2 img-fluid teambp__logo">
    </a>

    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
        data-bs-target="#teambp__collapsableNavbar" aria-controls="teambp__collapsableNavBar" aria-expanded="false"
        aria-label="Navbar toggler"></button>


    <div class="collapse navbar-collapse" id="teambp__collapsableNavbar">
        <ul class="navbar-nav ms-auto teambp__navbar-nav mx-3">
            <li class="nav-item mx-3">
                <a class="nav-link active" href="home" aria-current="page">Home
                    <span class="visually-hidden">(current)</span></a>
            </li>

            <li class="nav-item mx-3">
                <a class="nav-link" href="">About</a>
            </li>

            <li class="nav-item dropdown mx-3">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="">What we offer</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="">Learning</a>
                    <a class="dropdown-item" href="">ICT Consultation</a>
                    <a class="dropdown-item" href="">Patnerships and Trainnings</a>
                    <a class="dropdown-item" href="">Freelance</a>
                </div>
            </li>

            <li class="nav-item mx-3">
                <a class="nav-link" href="">Projects</a>
            </li>

            <li class="nav-item mx-3">
                <a class="nav-link" href="">Recent News</a>
            </li>

            <li class="nav-item mx-3">
                <a class="nav-link" href="">Blogs</a>
            </li>

            <li class="nav-item mx-3">
                <a class="btn btn-sm btn-outline-secondary nav-link" href="member-login">Sign In</a>
            </li>
            <span class="mt-2 d-none d-md-block">|</span>
            <li class="nav-item mt-3 mt-md-0 mx-3">
                <a class="btn btn-sm btn-info nav-link" href="member-registration">Register</a>
            </li>
        </ul>
    </div>
</nav>