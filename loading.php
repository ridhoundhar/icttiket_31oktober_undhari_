<!DOCTYPE html>
<html>
<head>
    <title>Loading...</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2c3e50;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .loading-container {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
        }

        h1 {
            color: #3498db;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #34495e;
        }
    </style>
</head>
<body>
    <div class="loading-container">
        <h1>Loading...</h1>
        <p>Sabar Ya Gaes Ya Bentar Ko Ga lama</p>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = "view/";
        }, 2000);
    </script>
</body>
</html>
