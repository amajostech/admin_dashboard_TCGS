<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Sheet</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
            font-size: 16px;
            color: #333;
        }

        .result-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .result-heading {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #3498db;
            margin-bottom: 20px;
        }

        .header-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .student-info-container {
            display: flex;
            align-items: center;
            justify-content: space-between; /* Adjust the spacing between items */
            margin-top: 20px;
        }

        .student-photo {
            max-width: 100px;
            max-height: 100px;
            margin-right: 20px;
            border-radius: 50%;
        }

        .student-details {
            flex: 1;
        }

        .result-table th, .result-table td {
            text-align: center;
            color: #333;
        }

        .result-table th {
            background-color: #f2f2f2;
        }

        .average {
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
            color: #e74c3c;
            font-size: 18px;
        }

        .domains-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .domains-table th, .domains-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            color: #333;
        }

        .domains-table th {
            background-color: #f2f2f2;
        }

        .teacher-remarks {
            margin-top: 20px;
            color: #333;
        }

        .signature-section {
            margin-top: 20px;
            color: #333;
        }

        .three-columns {
            display: flex;
            justify-content: space-between;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .result-container {
                box-shadow: none;
            }
        }
    </style>
</head>
<body>

    <div class="container result-container">

        <!-- Result Heading -->
        <h2 class="result-heading">2023/2024 RESULT SHEET</h2>

        <!-- Header Image -->
        <img src="path/to/header-image.jpg" alt="Header Image" class="header-image">

        <!-- Student Information and Details -->
        <div class="student-info-container">
            <img src="path/to/passport-photo.jpg" alt="Passport Photo" class="student-photo">
            <div class="student-details">
                <h2 class="text-primary">Student Name</h2>
                <p>Class: XYZ</p>
                <p>Date of Birth: DD/MM/YYYY</p>
                <p>Registration No: XYZ123</p>
                <!-- Add more student information as needed -->
            </div>
        </div>

        <!-- Separator -->
        <hr>

        <!-- Result Table -->
        <table class="table table-bordered result-table">
            <thead class="thead-light">
                <tr>
                    <th>SUBJECTS</th>
                    <th>CA1</th>
                    <th>CA2</th>
                    <th>EXAM</th>
                    <th>TOTAL</th>
                    <th>GRADE</th>
                    <th>AVERAGE</th>
                </tr>
            </thead>
            <tbody>
                <!-- Use PHP or JavaScript to dynamically generate rows based on your SQL data -->
                <!-- Repeat the following block for each subject -->
                <tr>
                    <td>Subject 1</td>
                    <td>90</td>
                    <td>85</td>
                    <td>92</td>
                    <td>267</td>
                    <td>A</td>
                    <td>89</td>
                </tr>
                <!-- Add more rows for the remaining subjects -->
            </tbody>
        </table>

        <div class="average">Overall Average: 86.00</div>

        <!-- Affective and Psychomotor Domains Table -->
        <table class="domains-table">
            <thead>
                <tr>
                    <th class="three-columns">Domain</th>
                    <th class="three-columns">Grade</th>
                </tr>
            </thead>
            <tbody>
                <!-- Repeat the following block for each domain -->
                <tr>
                    <td class="three-columns">Domain 1</td>
                    <td class="three-columns">A</td>
                </tr>
                <!-- Add more rows for the remaining domains -->
            </tbody>
        </table>

        <!-- Teacher Remarks -->
        <div class="teacher-remarks">
            <p class="text-primary"><strong>Teacher's Comment:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <p class="text-primary"><strong>General Remarks:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

        <!-- Principal Signature -->
        <div class="signature-section mt-4">
            <p class="text-right text-primary"><strong>Principal's Signature: ____________________</strong></p>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
