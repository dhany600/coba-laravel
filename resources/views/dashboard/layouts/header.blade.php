<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <form action="/logout" method="post">
                @csrf
                <button class="nav-link bg-dark border-0" type="submit">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</nav>
