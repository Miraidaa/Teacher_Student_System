<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

   
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: #fdfdfc;
            color: #1b1b18;
            margin: 0;
            padding: 20px;
        }

        .navbar {
            background-color: #007bff;
            padding: 10px;
        }

        .navbar a {
            color: #fff;
            font-weight: 500;
            text-decoration: none;
            padding: 8px 15px;
            transition: 0.3s ease-in-out;
        }

        .navbar a:hover {
            background-color: #0056b3;
            border-radius: 5px;
        }

        .content {
            padding: 40px 20px;
            max-width: 800px;
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            font-weight: 600;
            color: #007bff;
            margin-bottom: 15px;
        }

        p {
            font-size: 18px;
            font-weight: 500;
            color: #555;
            margin: 10px 0;
        }

        .highlight {
            font-weight: 600;
            color: #007bff;
        }

      
        @keyframes fadeIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
    </style>
</head>
<body>


    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            @if (Route::has('login'))
                <div class="navbar-nav">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        @endif
                        <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                    @endauth
                </div>
            @endif
        </div>
    </nav>

 
    <div class="content">
        <h1>Welcome to Our Application</h1>
        <p>This platform is designed to enhance collaboration between <span class="highlight">students</span> and <span class="highlight">teachers</span>.</p>
        <p>Our goal is to provide an intuitive and efficient space for managing subjects, assignments, and communication.</p>
        <p>Explore, connect, and make learning more interactive!</p>
    </div>

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
