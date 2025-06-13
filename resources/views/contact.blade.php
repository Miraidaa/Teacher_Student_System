<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>

  
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .contact-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
        }

        h1 {
            font-weight: 600;
            color: #007bff;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            font-weight: 500;
            margin: 10px 0;
        }

        .highlight {
            font-weight: 600;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="contact-container">
        <h1>Creator's Contacts </h1>
        <p><strong>Author:</strong> <span class="highlight">{{ $author }}</span></p>
        <p><strong>Neptun Code:</strong> <span class="highlight">{{ $neptun_code }}</span></p>
        <p><strong>Email:</strong> <span class="highlight">{{ $email }}</span></p>
    </div>
</body>
</html>
