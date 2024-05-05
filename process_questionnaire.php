<!DOCTYPE html>
<html>
<head>
    <title>Questionnaire Form - Results</title>
    <style>
        body{background-color: rgb(238, 205, 170);}
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #92450f;
            color: white;
        }
    </style>
</head>
<body>
<?php
// Define a class to represent a row in the table
class QuestionnaireRow {
    public $gender;
    public $age;
    public $interest;
    public $colors;
    public $talents;
    public $hub;
    public $feedbackTypes = [];
    public $feedback;

    public function __construct($gender, $age, $interest, $colors, $talents, $hub, $feedbackTypes, $feedback) {
        $this->gender = $gender;
        $this->age = $age;
        $this->interest = $interest;
        $this->colors = $colors;
        $this->talents = $talents;
        $this->hub = $hub;
        $this->feedbackTypes = $feedbackTypes;
        $this->feedback = $feedback;
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    $errors = [];
    if (empty($_POST["age"]) || empty($_POST["interest"]) || empty($_POST["feedback"])) {
        $errors[] = "Please fill out all the fields.";
    }
    if (strtolower($_POST["gender"]) !== "male" && strtolower($_POST["gender"]) !== "female") {
        $errors[] = "Please enter 'male' or 'female' for gender.";
    }
    if ($_POST["age"] < 6) {
        $errors[] = "Your age must be 6 years or older.";
    }
    

    // Handle form submission if no errors
    if (empty($errors)) {
        // Store form data in variables
        $gender = $_POST["gender"];
        $age = $_POST["age"];
        $interest = $_POST["interest"];
        $colors = $_POST["colors"];
        $talents = $_POST["talents"];
        $hub = $_POST["hub"];
        $feedbackTypes = isset($_POST["feedback-type"]) ? $_POST["feedback-type"] : [];
        $feedback = $_POST["feedback"];

        // Create an array to hold questionnaire rows
        $questionnaireRows = [];

        // Create a new questionnaire row object
        $questionnaireRow = new QuestionnaireRow($gender, $age, $interest, $colors, $talents, $hub, $feedbackTypes, $feedback);

        // Add the new row to the array
        $questionnaireRows[] = $questionnaireRow;

    
        echo "<h2>Results:</h2>";
        echo "<table>
                <tr>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Interest</th>
                    <th>Colors Friendly</th>
                    <th>Makes Talented</th>
                    <th>Hub for Talents</th>
                    <th>Feedback Types</th>
                    <th>Feedback</th>
                </tr>";
        
        foreach ($questionnaireRows as $row) {
            echo "<tr>
                    <td>{$row->gender}</td>
                    <td>{$row->age}</td>
                    <td>{$row->interest}</td>
                    <td>{$row->colors}</td>
                    <td>{$row->talents}</td>
                    <td>{$row->hub}</td>
                    <td>" . implode(", ", $row->feedbackTypes) . "</td>
                    <td>{$row->feedback}</td>
                </tr>";
        }
        echo "</table>";
    } else {
        // Display validation errors
        echo "<h2>Validation Errors:</h2>";
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
} else {
    
    header("Location: questionnaire_form.php");
    exit;
}
?>
</body>
</html>