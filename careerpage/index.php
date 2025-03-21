<?php
$request = trim($_SERVER['REQUEST_URI'], "/");

// Route requests
switch ($request) {
    case '':
    case 'jobApplication':
        require 'jobApplication.php';
        break;

    case 'admin':
        require 'admin/admin.php';
        break;

    case 'api/getApplications':
        require 'backend.php';
        getApplications();
        break;

    default:
        http_response_code(404);
        echo json_encode(["error" => "Not Found"]);
        break;
}
?>
