<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config/database.php'; 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(200);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    submitApplication();
} elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
    getApplications();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
}


function submitApplication() {
    global $database;

    $conn = $database->getConnection();

    try {
        // Ensure upload directory exists
        $uploadDir = __DIR__ . "/uploads/";
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Save Profile Picture
        $profilePicPath = null;
        if (!empty($_FILES["profilePicture"]["name"])) {
            $profilePicName = time() . "_" . basename($_FILES["profilePicture"]["name"]);
            $profilePicPath = $uploadDir . $profilePicName;
            move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $profilePicPath);
        }

        // Save Resume
        $resumePath = null;
        if (!empty($_FILES["resume"]["name"])) {
            $resumeName = time() . "_" . basename($_FILES["resume"]["name"]);
            $resumePath = $uploadDir . $resumeName;
            move_uploaded_file($_FILES["resume"]["tmp_name"], $resumePath);
        }

        // Prepare data for insertion
        $applicantData = [
            "firstName" => $_POST["firstName"] ?? "",
            "lastName" => $_POST["lastName"] ?? "",
            "fathersName" => $_POST["fathersName"] ?? "",
            "email" => $_POST["emailId"] ?? "",
            "gender" => $_POST["gender"] ?? "",
            "dob" => $_POST["dob"] ?? "",
            "phone" => $_POST["phone"] ?? "",
            "whatsapp" => $_POST["whatsapp"] ?? "",
            "currentAddress" => $_POST["currentAddress"] ?? "",
            "permanentAddress" => $_POST["permanentAddress"] ?? "",
            "destination" => $_POST["designation"] ?? "",
            "experience" => $_POST["experience"] ?? "",
            "linkedin" => $_POST["linkedin"] ?? "",
            "portfolio" => $_POST["portfolio"] ?? "",
            "project" => $_POST["project"] ?? "",
            "profilePicture" => $profilePicPath,
            "resume" => $resumePath,
            "workExperience" => json_encode($_POST['job_title'] ?? []), // Handle job titles
            "educationDetails" => json_encode([
                'degree' => $_POST['degree'] ?? [],
                'institution' => $_POST['institution'] ?? [],
                'stream' => $_POST['stream'] ?? [],
                'year' => $_POST['year'] ?? [],
            ]),
        ];

        // Insert into MySQL database
        $stmt = $conn->prepare("INSERT INTO applications (firstName, lastName, fathersName, email, gender, dob, phone, whatsapp, currentAddress, permanentAddress, destination, experience, linkedin, portfolio, project, profilePicture, resume, workExperience, educationDetails) VALUES (:firstName, :lastName, :fathersName, :email, :gender, :dob, :phone, :whatsapp, :currentAddress, :permanentAddress, :destination, :experience, :linkedin, :portfolio, :project, :profilePicture, :resume, :workExperience, :educationDetails)");

        $stmt->execute($applicantData);

        echo json_encode(["success" => true, "message" => "Application submitted successfully!"]);
    } catch (Exception $e) {
        echo json_encode(["success" => false, "message" => "Error: " . $e->getMessage()]);
    }
}

// Function to process work experience
function getWorkExperience() {
    $workExperience = [];
    foreach ($_POST['job_title'] as $index => $title) {
        $workExperience[] = [
            "job_title" => $title,
            "company" => $_POST['company'][$index] ?? "",
            "years" => $_POST['years'][$index] ?? "",
            "designation" => $_POST['designation'][$index] ?? "",
            "start_date" => $_POST['start_date'][$index] ?? "",
            "end_date" => $_POST['end_date'][$index] ?? "",
        ];
    }
    return $workExperience;
}

// Function to process education details
function getEducationDetails() {
    $educationDetails = [];
    foreach ($_POST['degree'] as $index => $degree) {
        $educationDetails[] = [
            "degree" => $degree,
            "institution" => $_POST['institution'][$index] ?? "",
            "stream" => $_POST['stream'][$index] ?? "",
            "year" => $_POST['year'][$index] ?? "",
            "start_date" => $_POST['start_date'][$index] ?? "",
            "end_date" => $_POST['end_date'][$index] ?? "",
        ];
    }
    return $educationDetails;
}

function generatePDF($applicantData) {
    require('fpdf/fpdf.php');

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(190, 10, 'Job Application', 0, 1, 'C');
    $pdf->Ln(10);
    
    // Format PDF content properly
    $pdf->SetFont('Arial', '', 12);
    foreach ($applicantData as $key => $value) {
        $pdf->Cell(0, 10, ucfirst($key) . ': ' . $value, 0, 1);
    }

    // Save the PDF in the "uploads" folder
    $uploadDir = __DIR__ . "/uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $pdfFileName = 'application_' . time() . '.pdf';
    $pdfFilePath = $uploadDir . $pdfFileName;
    $pdf->Output($pdfFilePath, 'F'); // Save PDF to server

    return $pdfFileName; // Return the generated PDF file name
}

function getApplications() {
    global $database;

    $conn = $database->getConnection();

    try {
        $stmt = $conn->query("SELECT * FROM applications");
        $applications = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode(["success" => true, "data" => $applications]);
    } catch (Exception $e) {
        echo json_encode(["success" => false, "message" => "Error: " . $e->getMessage()]);
    }
}

?>