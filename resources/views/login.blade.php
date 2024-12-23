<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    @include('navbar')

    <section class="login">
        <h1>Login</h1>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" maxlength="254" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" maxlength="255" required>
            <br>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember Me</label>
            <br>

            <button type="submit">Login</button>
        </form>

        <p><a href="{{ route('password.request') }}">Forgot Your Password?</a></p>
    </section>

    <p>New to ...? <a href="{{ route('register') }}">Sign Up</a></p>
</body>
</html>