<nav class="navbar navbar-expand-lg bg-white shadow p-5">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="/">Home</a>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Contact
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end">
                        <li><a class="dropdown-item" href="tel:09397883485">RHU - 0939-788-3485</a></li>
                        <li><a class="dropdown-item" href="tel:09682162512">MDRRMO - 0968-216-2512</a></li>
                        <li><a class="dropdown-item" href="tel:09066513731">MDRRMO - 0906-651-3731</a></li>
                        <li><a class="dropdown-item" href="tel:09654927494">BFP - 0965-492-7494</a></li>
                        <li><a class="dropdown-item" href="tel:09214524336">BFP - 0921-4524336</a></li>
                        <li><a class="dropdown-item" href="tel:09276964108">PNP - 0927-696-4108</a></li>
                        <li><a class="dropdown-item" href="tel:09685497578">PNP - 0968-549-7578</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        About
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end">
                        <li><a class="dropdown-item" href="{{ route('history') }}">History</a></li>
                        <li><a class="dropdown-item" href="#">News & Events</a></li>
                        <li><a class="dropdown-item" href="#">Tourism Officials</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
