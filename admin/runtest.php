<?php
$servername = "localhost";
$username = "tcgscomn_admin"; // Change value on Live Server
$password = "Amajos687@$$";  // Assuming an empty password
$dbname = "tcgscomn_secondary";

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
echo "<body onload=window.print()>";
// Get the Data from a Partcular Class e.g Session, Class, Term
if (isset($_GET['term'])) {
    $schoolId = $_GET['schoolid'];
    $term = $_GET['term'];
    $session = $_GET['session'];
    $category = $_GET['category'];
    $class = $_GET['class'];    

}

$schoolQuery = "SELECT sch_name FROM admin_login WHERE school_id = $schoolId ";
$schoolresult = mysqli_query($link, $schoolQuery);
foreach($schoolresult as $school){
    echo "<center> <h1>" .  $school['sch_name'] . "</h1>";
}

echo "<h2> $class  |  $term  |  $session </h3></center>";

$subjectQuery = "SELECT DISTINCT subject_name FROM subjects WHERE school_id = '$schoolId' && category = '$category' ";
$subjectResult = $link->query($subjectQuery);

if ($subjectResult->num_rows > 0) {
    // Build an array of subjects
    $subjects = [];
    while ($subjectRow = $subjectResult->fetch_assoc()) {
        $subjects[] = $subjectRow["subject_name"];
    }

    // Output data for each student in a tabular format with proper styling
    echo "<style>
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            th {
                background-color: #f2f2f2;
            }
          </style>";
    echo "<table>";
    echo "<tr><th>Student</th>";

    // Output header row with subjects as columns
    foreach ($subjects as $subject) {
        $shortened = substr($subject, 0, 3);
        echo "<th>$shortened</th>";
    }

    // Additional column for the total score of each student
    echo "<th>Total</th>";

    echo "</tr>";

    // SQL query to fetch student names, scores, and total for the current subject
    $sql = "SELECT
                resultdatatotal.student,
                resultdatatotal.subject_name,
                resultdatatotal.total,
                resultdatatotal.class
            FROM resultdatatotal
            WHERE resultdatatotal.subject_name IN ('" . implode("', '", $subjects) . "') && resultdatatotal.school_id = '$schoolId' && resultdatatotal.class = '$class' && resultdatatotal.term = '$term' && resultdatatotal.session = '$session' ORDER BY id ";

    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        $students = [];

        while ($row = $result->fetch_assoc()) {
            // Track unique students
            $studentKey = $row["student"];
            if (!isset($students[$studentKey])) {
                $students[$studentKey] = [];
            }

            // Store scores for each subject
            $students[$studentKey][$row["subject_name"]] = $row["total"];
        }

        // Output data for each student
        foreach ($students as $studentName => $scores) {
            echo "<tr><td>$studentName</td>";

            // Output scores for each subject
            foreach ($subjects as $subject) {
                echo "<td>" . ($scores[$subject] ?? "") . "</td>";
            }

            // Calculate and output total score for the current student
            echo "<td>" . array_sum($scores) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='" . (count($subjects) + 2) . "'>No results found</td></tr>";
    }

    echo "</table>";
} else {
    echo "No subjects found for school_id $schoolId";
}

?>

<script>
  window.print;
</script>