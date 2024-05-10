<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Inputs</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>User Inputs</h2>
    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fields = array(
                "First Name" => $_POST['first_name'],
                "Last Name" => $_POST['last_name'],
                "Email" => $_POST['email'],
                "Password" => $_POST['password'],
                "Phone Number" => $_POST['phone_number']
            );

            foreach ($fields as $field => $value) {
                echo "<tr><td>$field</td><td>$value</td></tr>";
            }
        }
        ?>
    </table>
</body>
</html>