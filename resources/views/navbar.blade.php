{{-- common links --}}

@auth
    <!-- Hide the Logout button on login or register page -->
    @if (!Request::is('login') && !Request::is('register'))
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout">Logout</button>
            </form>    
        </li>
    @endif
@endauth

@guest
    @if (Request::is('login'))
        <li><a href="{{ route('register') }}">Register</a></li>
    @elseif (Request::is('register'))
        <li><a href="{{ route('login') }}">Login</a></li>
    @endif
@endguest
