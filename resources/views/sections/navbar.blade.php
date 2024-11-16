@if(request()->route()->getName() == 'root')
<style>
    #mainNavbar {
        background-color: transparent;
        transition: background-color 0.3s ease-in-out;
        position: fixed;
        width: 100%;
        color: #ffffff;
        z-index: 999;
    }
    .nav-link, .navbar-brand {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }
    #mainNavbar.scrolled {
        background-color: #7b88ff; /* Change to your preferred color */
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, 0.15);
    }
</style>
@else
<style>
    #mainNavbar {
        background-color: #7b88ff;
        z-index: 999;
        /* width: 100%;
        position: fixed; */
    }
    
</style>
@endif
{{-- <nav class="navbar navbar-expand-lg  shadow p-5  @if (request()->route()->getName() == 'root') bg-primary @else bg-info @endif"> --}}
<nav id="mainNavbar" class="navbar navbar-expand-lg p-5  @if (request()->route()->getName() !== 'root') shadow @endif" >
{{-- <nav class="navbar navbar-expand-lg  shadow p-5"> --}}
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mt-4 mt-lg-0" id="navbarTogglerDemo01">
            <a class="navbar-brand text-white" href="/">Home</a>
            {{-- @if (request()->route()->getName() == 'root') --}}
                <ul class="navbar-nav mb-2 mb-lg-0 text-white">
                    <li class="nav-item dropdown text-white">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Destinations
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg-start">
                            @foreach ($businessTypes as $businessType)
                                <li><a class="dropdown-item" href="{{ route('guests.destinations.index', ['type' => $businessType->id]) }}">{{ $businessType->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Contact
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li class="dropdown-item">RHU - 0939-788-3485 </li>
                            <li class="dropdown-item">MDRRMO - 0968-216-2512 </li>
                            <li class="dropdown-item">MDRRMO - 0906-651-3731 </li>
                            <li class="dropdown-item">BFP - 0965-492-7494 </li>
                            <li class="dropdown-item">BFP - 0921-4524336 </li>
                            <li class="dropdown-item">PNP - 0927-696-4108 </li>
                            <li class="dropdown-item">PNP - 0968-549-7578 </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            About
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><a class="dropdown-item" href="{{ route('history') }}">History</a></li>
                            <li><a class="dropdown-item" href="{{ route('news-events') }}">News and Events</a></li>
                            <li><a class="dropdown-item" href="{{ route('officials') }}">Tourism Officials</a></li>
                        </ul>
                    </li>
                </ul>
            {{-- @endif --}}
        </div>
    </div>
</nav>
<script>
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('mainNavbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>
