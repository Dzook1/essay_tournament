<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    @include('navbar')

    <section class="register">
        <h1>Register</h1>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" maxlength="30" required>
            <br>
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" maxlength="30" required>
            <br>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" maxlength="40" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" maxlength="254" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" maxlength="255" required>
            <br>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" maxlength="255" required>
            <br>

            <button type="submit">Register</button>
        </form>
    </section>
</body>
</html>