<?php
$sourceServername = "localhost";
$sourceUsername = "root";
$sourcePassword = "";
$sourceDbname = "tcgs_secondary"; // Source database

// Create source connection
$sourceLink = new mysqli($sourceServername, $sourceUsername, $sourcePassword, $sourceDbname);

// Check source connection
if ($sourceLink->connect_error) {
    die("Source Connection failed: " . $sourceLink->connect_error);
}

// ... (The rest of your existing code)

$destinationServername = "localhost";
$destinationUsername = "root";
$destinationPassword = "";
$destinationDbname = "tcgs_secondary"; // Destination database (same as source database)

// Create destination connection
$destinationLink = new mysqli($destinationServername, $destinationUsername, $destinationPassword, $destinationDbname);

// Check destination connection
if ($destinationLink->connect_error) {
    die("Destination Connection failed: " . $destinationLink->connect_error);
}

// Loop through students and insert records into the destination table (resultdatasubject)
foreach ($students as $studentName => $scores) {
    foreach ($subjects as $subjectName) {
        $score = isset($scores[$subjectName]) ? $scores[$subjectName] : "";
        $position = getPositionForSubject($students, $studentName, $subjectName);

        // Fetch details from the source table (resultdatatotal)
        $fetchDetailsSql = "SELECT * FROM resultdatatotal 
                            WHERE school_id = '$schoolId' 
                            AND student = '$studentName' 
                            AND subject_name = '$subjectName' 
                            AND class = '$class' 
                            AND term = '$term' 
                            AND session = '$session'";

        $resultDetails = $sourceLink->query($fetchDetailsSql);
        $details = $resultDetails->fetch_assoc();

        // Insert record into the destination table (resultdatasubject)
        $insertSql = "INSERT INTO resultdatasubject 
                      (school_id, student, subject_name, ca1, ca2, exam, total, term, session, class, category, subject_rank) 
                      VALUES 
                      ('$schoolId', '$studentName', '$subjectName', '{$details['ca1']}', '{$details['ca2']}', '{$details['exam']}', '$score', '$term', '$session', '$class', '$category', '$position')";

        if ($destinationLink->query($insertSql) !== TRUE) {
            echo "Error inserting record: " . $destinationLink->error;
        }
    }
}

// Close connections
$sourceLink->close();
$destinationLink->close();
?>
