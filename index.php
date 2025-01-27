<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Electricity Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #ffffff;
        }
        .container {
            text-align: center;
            max-width: 800px;
            margin: 100px auto;
            background: #ffffff;
            color: #333;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 40px;
        }
        h1 {
            font-size: 3rem;
            font-weight: bold;
            color: #2575fc;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #2575fc;
            border: none;
            font-size: 1.2rem;
            padding: 10px 20px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #1d63c5;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Welcome to the Electricity Calculator</h1>
    <p>Easily calculate the power, energy consumption, and cost of electricity usage for your appliances and devices. This tool helps you estimate energy usage over time and analyze costs based on your local electricity rates.</p>
    <a href="calculation.php" class="btn btn-primary">Get Started</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>