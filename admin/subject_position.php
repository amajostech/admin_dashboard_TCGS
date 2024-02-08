<?php
$servername = "localhost";
$username = "root";
$password = "";  // Assuming an empty password
$dbname = "tcgs_secondary";

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

echo "<body onload=window.print()>";
// Get the Data from a Particular Class e.g Session, Class, Term
if (isset($_GET['term'])) {
    $schoolId = $_GET['schoolId'];
    $term = $_GET['term'];
    $session = $_GET['session'];
    $category = $_GET['category'];
    $class = $_GET['class'];
}

$schoolQuery = "SELECT sch_name FROM admin_login WHERE school_id = $schoolId ";
$schoolresult = mysqli_query($link, $schoolQuery);
foreach ($schoolresult as $school) {
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

    // Output header row with subjects and position as columns
    foreach ($subjects as $subject) {
        $shortened = substr($subject, 0, 3);
        echo "<th>$subject</th>";
        echo "<th>Position</th>";
    }

    echo "</tr>";

    // SQL query to fetch results for all students in the specified class and subjects
    $sql = "SELECT
                resultdatatotal.student,
                resultdatatotal.subject_name,
                resultdatatotal.total,
                resultdatatotal.class
            FROM resultdatatotal
            WHERE resultdatatotal.subject_name IN ('" . implode("', '", $subjects) . "') && resultdatatotal.school_id = '$schoolId' && resultdatatotal.class = '$class' && resultdatatotal.term = '$term' && resultdatatotal.session = '$session' ";

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

        // Function to calculate the position based on the score for a particular subject
        function getPositionForSubject($studentScores, $subject)
        {
            $sortedScores = array_values($studentScores);
            rsort($sortedScores);
            $position = array_search($studentScores[$subject], $sortedScores) + 1;
            return $position;
        }

        // Output data for each student
        foreach ($students as $studentName => $scores) {
            echo "<tr><td>$studentName</td>";

            // Output score and position for each subject
            foreach ($subjects as $subject) {
                echo "<td>" . ($scores[$subject] ?? "") . "</td>";
                echo "<td>" . getPositionForSubject($scores, $subject) . "</td>";
            }

            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='" . (count($subjects) * 2) . "'>No results found</td></tr>";
    }

    echo "</table>";
} else {
    echo "No subjects found for school_id $schoolId";
}

// Close connection
$link->close();
?>

