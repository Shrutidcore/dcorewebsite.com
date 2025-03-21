<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome Icons -->
</head>

<body>

    <div class="container">
        <h2>Job Application Form</h2>
        <form id="jobApplicationForm" action="http://localhost:8000/backend.php" method="POST" enctype="multipart/form-data">
            <!-- Basic Info -->
            <div class="row">
                <label>First Name: *</label>
                <input type="text" name="firstName" placeholder="First Name" required>
                <label>Last Name: *</label>
                <input type="text" name="lastName" placeholder="Last Name" required>
            </div>
            <div class="row">
                <label>Father's Name: *</label>
                <input type="text" name="fathersName" placeholder="Father's Name" required>
                <label>Mothers Name: *</label>
                <input type="text" name="mothersName" placeholder="Mother's Name" required>
            </div>
            <div class="row">
                <label>Gender: *</label>
                <select name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
                <label>Marital Status: *</label>
                <select name="maritalStatus" required>
                    <option value="">Select Marital Status</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="row">
                <label>Email *</label>
                <input type="email" name="emailId" required>
                <label>Date of Birth: *</label>
                <input type="date" name="dob" required>
            </div>
            <div class="row">
                <label>Phone: *</label>
                <input type="tel" name="phone" placeholder="Phone" required>
                <label>WhatsApp: *</label>
                <input type="tel" name="whatsapp" placeholder="WhatsApp" required>
            </div>
            <div class="row">
                <label>Current Address: *</label>
                <textarea name="currentAddress" required></textarea>
                <label>Permanent Address: *</label>
                <textarea name="permanentAddress" required></textarea>
            </div>
            <div class="row">
            <label>Designation: *</label>
            <select name="designation" required>
                <option value="">Select Designation</option>
                <option value="SEO">SEO</option>
                <option value="Wordpress Developer">Wordpress Developer</option>
                <option value="MERN Stack Developer">MERN Stack Developer</option>
                <option value="Full Stack Developer">Full Stack Developer</option>
                <option value="Web Developer">Web Developer</option>
                <option value="Social Media Marketing">Social Media Marketing</option>
                <option value="PHP Developer">PHP Developer</option>
                <option value="Email Marketing">Email Marketing</option>
                <option value="Others">Others</option>


                <!-- Add more designations as needed -->
            </select>

                <label for="experience">Total Experience: *</label>
                <input type="text" name="experience" placeholder="Total Experience (MM/YYYY)" required>
            </div>

            <h3>Education Details</h3>
            <div id="education-container">
                <div class="edu-group">
                    <div class="edu-row">
                        <div class="field-group">
                            <label>Degree: *</label>
                            <input type="text" name="degree[]" placeholder="Degree Name" required>
                        </div>
                        <div class="field-group">
                            <label>Institution: *</label>
                            <input type="text" name="institution[]" placeholder="Institution" required>
                        </div>
                        <div class="field-group">
                            <label>Stream: *</label>
                            <input type="text" name="stream[]" placeholder="Stream" required>
                        </div>
                    </div>
                    <div class="edu-row">
                        <div class="field-group">
                            <label>Year: *</label>
                            <input type="text" name="year[]" placeholder="Year of Passing" required>
                        </div>
                        <div class="field-group">
                            <label>Start Date: *</label>
                            <input type="date" name="dob" required>
                            </div>
                        <div class="field-group">
                            <label>End Date: *</label>
                            <input type="date" name="dob" required>
                        </div>
                        <div class="button-group" style="display: flex; align-items: center; gap: 5px;">
        <button type="button" class="add-btn" onclick="addEducation()" style="width: 30px; height: 30px; font-size: 15px;">+</button>
        <button type="button" onclick="removeEduGroup(this)" style="width: 30px; height: 30px; font-size: 15px; display: none;">−</button>
    </div>
                    </div>
                </div>
            </div>

            <h3>Work Experience</h3>
            <div id="work-container">
                <div class="work-group">
                    <div class="edu-row">
                        <div class="field-group">
                            <label>Job Title: *</label>
                            <input type="text" name="job_title[]" placeholder="Job Title *" required>
                        </div>
                        <div class="field-group">
                            <label>Company: *</label>
                            <input type="text" name="company[]" placeholder="Company Name *" required>
                        </div>
                        <div class="field-group">
                            <label>Total Years: *</label>
                            <input type="text" name="years[]" placeholder="0 *" required>
                        </div>
                    </div>
                    <div class="edu-row">
                        <div class="field-group">
                            <label>Designation: *</label>
                            <input type="text" name="designation[]" placeholder="Designation *" required>
                        </div>
                        <div class="field-group">
                            <label>Start Date: *</label>
                            <input type="date" name="start_date[]" required>
                            </div>
                        <div class="field-group">
                            <label>End Date: *</label>
                            <input type="date" name="end_date[]" required>
                        </div>
                            <div class="button-group" style="display: flex; align-items: center; gap: 5px;">
        <button type="button" class="add-btn" onclick="addWorkExperience()" style="width: 30px; height: 30px; font-size: 15px;">+</button>
        <button type="button" onclick="removeEduGroup(this)" style="width: 30px; height: 30px; font-size: 15px; display: none;">−</button>
    </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <label>Upload Profile Picture: *</label>
                <input type="file" name="profilePicture" accept="image/*" required>
            </div>
            <div class="row">
                <label>LinkedIn Profile URL:</label>
                <input type="url" name="linkedin">
            </div>
            <div class="row">
                <label>Portfolio URL: *</label>
                <input type="url" name="portfolio">
            </div>
            <div class="row">
                <label>Project/Website URL: *</label>
                <input type="url" name="project">
            </div>
            <div class="row">
                <label>Upload Resume: *</label>
                <input type="file" name="resume" accept="application/pdf" required>
            </div>
            <button type="submit">Submit Application</button>
        </form>
        <p id="responseMessage"></p>
    </div>

    <script>
        function togglePresent(checkbox) {
            let endDateInput = checkbox.closest('.edu-row, .work-row').querySelector('.end-date');
            if (checkbox.checked) {
                endDateInput.value = "";
                endDateInput.disabled = true;
            } else {
                endDateInput.disabled = false;
            }
        }

        function addEducation() {
            let container = document.getElementById("education-container");
            let newGroup = document.createElement("div");
            newGroup.classList.add("edu-group");

            newGroup.innerHTML = `
                <div class="edu-row">
                    <div class="field-group">
                        <label>Degree: *</label>
                        <input type="text" name="degree[]" placeholder="Degree Name" required>
                    </div>
                    <div class="field-group">
                        <label>Institution: *</label>
                        <input type="text" name="institution[]" placeholder="Institution" required>
                    </div>
                    <div class="field-group">
                        <label>Stream: *</label>
                        <input type="text" name="stream[]" placeholder="Stream" required>
                    </div>
                </div>
                <div class="edu-row">
                    <div class="field-group">
                        <label>Year: *</label>
                        <input type="text" name="year[]" placeholder="Year of Passing" required>
                    </div>
                    <div class="field-group">
                        <label>Start Date: *</label>
                <input type="date" name="start_date[]" required>
                    </div>
                    <div class="field-group">
                        <label>End Date: *</label>
                <input type="date" name="end_date[]" required>
                    </div>
                    <label><input type="checkbox" class="present-checkbox" onchange="togglePresent(this)"> Present</label>
                </div>
                <button type="button" onclick="removeEduGroup(this)" style="width: 30px; height: 30px; font-size: 15px;">-</button>
            `;

            container.appendChild(newGroup);
        }

        function addWorkExperience() {
            let container = document.getElementById("work-container");
            let newGroup = document.createElement("div");
            newGroup.classList.add("work-group");

            newGroup.innerHTML = `
                <div class="edu-row">
                    <div class="field-group">
                        <label>Job Title: *</label>
                        <input type="text" name="job_title[]" placeholder="Job Title *" required>
                    </div>
                    <div class="field-group">
                        <label>Company: *</label>
                        <input type="text" name="company[]" placeholder="Company Name *" required>
                    </div>
                    <div class="field-group">
                        <label>Total Years: *</label>
                        <input type="text" name="years[]" placeholder="0 *" required>
                    </div>
                </div>
                <div class="edu-row">
                    <div class="field-group">
                        <label>Designation: *</label>
                        <input type="text" name="designation[]" placeholder="Designation *" required>
                    </div>
                    <div class="field-group">
                        <label>Start Date: *</label>
                <input type="date" name="start_date[]" required>
                    </div>
                    <div class="field-group">
                        <label>End Date: *</label>
                <input type="date" name="end_date[]" required>
                    </div>
                    <label><input type="checkbox" class="present-checkbox" onchange="togglePresent(this)"> Present</label>
                </div>
                <button type="button" onclick="removeWorkGroup(this)" style="width: 30px; height: 30px; font-size: 15px;">-</button>
            `;

            container.appendChild(newGroup);
        }

        function removeEduGroup(button) {
            button.closest('.edu-group').remove();
        }

        function removeWorkGroup(button) {
            button.closest('.work-group').remove();
        }

        document.getElementById("jobApplicationForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent default form submission

            let formData = new FormData(this); // Collect form data

            fetch("http://localhost:8000/backend.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message); // Show success/failure message
                console.log("Response:", data);
            }).catch(error => console.error("Error:", error));
        });
    </script>
</body>

</html>
