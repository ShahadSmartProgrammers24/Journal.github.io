<!DOCTYPE html>
<html>
<head>
    <title>Subscription Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8d1c3;
        }

        table {
            width: 50%;
            margin: 50px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #5c2c1a;
            color: white;
        }
    </style>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subscription = $_POST["subscription"];
    $writer = isset($_POST["writer"]) ? true : false;
    $price = 0;

    switch ($subscription) {
        case "1 month":
            $price = 3;
            break;
        case "3 months":
            $price = 6;
            break;
        case "1 year":
            $price = 25;
            break;
        default:
            break;
    }
    
    // Calculate discount for writers/authors
    if ($writer) {
        $discount = $price * 0.2;
        $price -= $discount;
    }
    ?>
    <h2 style="text-align: center;">Subscription Details</h2>
    <table>
        <tr>
            <th>Subscription Type</th>
            <th>Writer/Author</th>
            <th>Price (OMR)</th>
        </tr>
        <tr>
            <td><?php echo $subscription; ?></td>
            <td><?php echo $writer ? "Yes" : "No"; ?></td>
            <td><?php echo $price; ?></td>
        </tr>
    </table>
    <?php
}
?>
</body>
</html>