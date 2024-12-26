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
    <li><a href="{{ route('register') }}">Register</a></li>
    <li><a href="{{ route('login') }}">Login</a></li>
@endguest
