<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $voltage = floatval($_POST['voltage']);
    $current = floatval($_POST['current']);
    $rate = floatval($_POST['rate']);

    // Calculate power in kW
    $power = ($voltage * $current) / 1000; // Convert to kW

    // Convert rate to RM
    $rate_rm = $rate / 100; // Convert sen/kWh to RM/kWh

    // Calculate energy and total cost per hour and per day
    $results = [];
    for ($hour = 1; $hour <= 24; $hour++) {
        $energy = $power * $hour; // Energy in kWh
        $total = $energy * $rate_rm; // Total cost in RM
        $results[] = [
            'hour' => $hour,
            'energy' => round($energy, 5),
            'total' => round($total, 2)
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            animation: backgroundChange 20s infinite;
        }
        @keyframes backgroundChange {
            0% { background-color: #6a11cb; }
            25% { background-color: #2575fc; }
            50% { background-color: #1d63c5; }
            75% { background-color: #6a11cb; }
            100% { background-color: #2575fc; }
        }
        .container {
            background: #ffffff;
            color: #333;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 800px;
            margin: 50px auto;
        }
        h1 {
            font-size: 3rem;
            font-weight: bold;
            color: #2575fc;
            text-align: center;
            margin-bottom: 20px;
        }
        form label {
            font-weight: bold;
            font-size: 1.1rem;
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
        table {
            background: #f8f9fa;
            margin-top: 20px;
        }
        table th {
            background: #2575fc;
            color: #fff;
            text-align: center;
            font-size: 1.1rem;
        }
        table td {
            background: #ffffff;
            text-align: center;
            font-size: 1rem;
        }
        .results {
            background: #eef3fc;
            padding: 20px;
            border-radius: 15px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .results h2 {
            font-size: 2rem;
            color: #2575fc;
        }
        .results p {
            font-size: 1.2rem;
        }
        .landing-page {
            text-align: center;
            margin-top: 100px;
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
        .landing-page h1 {
            font-size: 3rem;
            color: #2575fc;
            margin-bottom: 30px;
        }
        .landing-page p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        .landing-page a {
            font-size: 1.2rem;
            padding: 10px 20px;
            border-radius: 50px;
            background-color: #2575fc;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .landing-page a:hover {
            background-color: #1d63c5;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
<!-- Landing Page Section -->
<div class="container landing-page">
    <h1>Welcome to the Electricity Calculator</h1>
    <p>Calculate the energy consumption and cost based on voltage, current, and rate.</p>
    <a href="calculation.php" class="btn btn-primary">Start Calculation</a>
</div>

<!-- Main Calculation Form -->
<?php if (isset($results)): ?>
    <div class="container">
        <h1>Electricity Calculator</h1>
        <form method="POST" class="mt-4">
            <div class="form-group">
                <label for="voltage">Voltage (V)</label>
                <input type="number" step="0.01" class="form-control" id="voltage" name="voltage" value="<?= isset($voltage) ? htmlspecialchars($voltage) : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="current">Current (A)</label>
                <input type="number" step="0.01" class="form-control" id="current" name="current" value="<?= isset($current) ? htmlspecialchars($current) : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="rate">Current Rate (sen/kWh)</label>
                <input type="number" step="0.01" class="form-control" id="rate" name="rate" value="<?= isset($rate) ? htmlspecialchars($rate) : '' ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Calculate</button>
        </form>

        <div class="results">
            <h2>Results</h2>
            <p><strong>Power:</strong> <?= round($power, 5) ?> kW</p>
            <p><strong>Rate:</strong> <?= round($rate_rm, 3) ?> RM</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th># Hour</th>
                        <th>Energy (kWh)</th>
                        <th>Total Cost (RM)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result): ?>
                        <tr>
                            <td><?= $result['hour'] ?></td>
                            <td><?= $result['energy'] ?></td>
                            <td><?= $result['total'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>