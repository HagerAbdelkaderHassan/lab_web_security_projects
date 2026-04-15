<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Product Store</a>
            <div>
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-light">Register</a>
                @else
                    <a href="{{ route('dashboard') }}" class="btn btn-light">Dashboard</a>
                @endguest
            </div>
        </div>
    </nav>
    <div class="container mt-5 text-center">
        <h1>Welcome to Product Store</h1>
        <p class="lead">Your one-stop shop for amazing products!</p>
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Get Started</a>
    </div>
</body>
</html>