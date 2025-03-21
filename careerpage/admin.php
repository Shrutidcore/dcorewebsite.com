<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Job Applications</title>
    <link rel="stylesheet" href="admin.css">

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch("http://localhost:8000/backend.php?method=getApplications")
            .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById("applicationsBody");
                    tableBody.innerHTML = "";
                    if (data.length === 0) {
                        tableBody.innerHTML = "<tr><td colspan='4' class='loading'>No applications found.</td></tr>";
                        return;
                    }
                    data.forEach(app => {
                        const row = `<tr>
                            <td>${app.firstName} ${app.lastName}</td>
                            <td>${app.email}</td>
                            <td>${app.phone}</td>
                            <td><a href="${app.resume}" target="_blank" style="color: #007BFF; text-decoration: none;">View Resume</a></td>
                        </tr>`;
                        tableBody.innerHTML += row;
                    });
                })
                .catch(error => {
                    console.error("Error fetching applications:", error);
                    document.getElementById("applicationsBody").innerHTML = "<tr><td colspan='4' class='loading'>Failed to load applications.</td></tr>";
                });
        });
    </script>
</head>
<body>
    <h2>Admin Panel - Job Applications</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Resume</th>
            </tr>
        </thead>
        <tbody id="applicationsBody">
            <tr><td colspan="4" class="loading">Loading...</td></tr>
        </tbody>
    </table>
</body>
</html>
