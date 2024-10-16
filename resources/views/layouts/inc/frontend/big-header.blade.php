
<nav class="navbar">
    <ul class="nav-links">
        <li class="nav-link">
            <a href="{{route('index')}}">Home</a>
        </li>
        <li class="nav-link services">
            <a href="{{url('frontend/introduce')}}">Artists</a>
        </li>
        <li class="nav-link services">
            <a href="#">Tickets
                <span class="material-icons dropdown-icon">
                  <i class="bi bi-ticket-detailed"></i>
                </span>
            </a>
            <ul class="drop-down">
                <a href="#"><li>Metro Boomin</li></a>
                <a href="#"><li>CAS</li></a>
                <a href="#"><li>Billie Eilish</li></a>
            </ul>
        </li>
        <li class="nav-link services">
            <a href="{{url('frontend/login')}}">Sign In
                <span class="material-icons dropdown-icon">
                  <i class="bi bi-box-arrow-in-right"></i>
                </span>

            </a>
            <!-- <ul class="drop-down">
                <li>Service 1</li>
                <li>Service 2</li>
                <li>Service 3</li>
            </ul> -->
        </li>
    </ul>
</nav>
