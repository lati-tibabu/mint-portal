<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacancy</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/vacancy_styles.css">
</head>

<body>
    <!-- <div id="placeHolderHeader"></div>
    <script src="js/header.js"></script> -->

    <?php
    include("header.php");
    ?>

    <main>
        <?php
        include("../mint-portal/back_end/config.php");

        $job_id = $_GET['job_id'];

        // if ($job_id === null){
        //     $job_id = 4;
        // }
        // // $job_id = 4;

        $query = "SELECT * FROM vacancy where job_id = $job_id;";

        $result = mysqli_query($con, $query);

        $data = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        } else {
            echo "<script>alert('vacancy couldn't found');</script>";
            header('Location: ../mint-portal/vacancy_detail.php');
        }
        ?>


        <div class="vacancy-form-page">
        <div class="back-button">

            <button>
                <a href="vacancy_detail.php?job_id=<?php echo $job_id;?>">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                    </svg> Vacancies -->
                    <i class="fa-solid fa-xmark"></i>
                </a>
            </button>
        </div>
            <div class="main-title application-form-title">
                Vacancy Application Form
            </div>
            <div class="application-section">
                <div class="vacancy-information">
                    <!-- <div class="job-title">
                        <p><span>Job ID: <br></span><?php echo $data[0]['job_title'] ?></p>
                    </div> -->

                    <div class="job-title">
                        <p><span>Job Title: <br></span><?php echo $data[0]['job_title'] ?></p>
                    </div>

                    <div class="department">
                        <p><span>Department/Division: <br></span><?php echo $data[0]['department_division'] ?></p>
                    </div>
                </div>

                <div class="form-section">
                    <form action="../mint-portal/back_end/vacancy-application.php" method="post" enctype="multipart/form-data">
                        <div class="apply-section personal-information">
                            <div class="form-section-title">
                                Personal Information
                            </div>
                            <div class="input-section">
                                <div style="display: none;">
                                    <label for="job_id">Job ID</label>
                                    <input type="text" name="job_id" id="job_id" value="<?php echo $data[0]['job_id'] ?>" readonly>
                                </div>

                                <div>
                                    <label for="fname">First Name</label>
                                    <input type="text" name="first-name" id="fname" required>
                                </div>

                                <div>
                                    <label for="mname">Middle Name</label>
                                    <input type="text" name="middle-name" id="mname" required>
                                </div>

                                <div>
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="last-name" id="lname" required>
                                </div>

                                <!-- <div class="gender">
                                    <label for="gender">Gender</label>
                                    Male<input type="radio" name="gender" id="gender" value="Male" required>
                                    Female<input type="radio" name="gender" id="gender" value="Female" required>
                                </div> -->

                                <div>
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender">
                                        <option value="">Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" name="phone" id="phone" required>
                                </div>

                                <div>
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email">
                                </div>

                                <div>
                                    <label for="dob">Date of Birth(GC)</label>
                                    <input type="date" name="dob" id="dob" required>
                                </div>

                                <div>
                                    <label for="marital-status">Marital Status</label>
                                    <select name="marital-status" id="marital-status">
                                        <option value="">Select</option>
                                        <option value="Single">Single</option>
                                        <option value="Single">Married</option>
                                        <option value="Single">Divorced</option>
                                        <option value="Single">Separated</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="address">Address</label>
                                    <input type="text" id="address" name="address" id="adress">
                                </div>

                                <div>
                                    <label for="address2">Additional Address</label>
                                    <input type="text" name="address2" id="address2">
                                </div>
                            </div>

                        </div>

                        <div class="apply-section educational-background">
                            <div class="form-section-title">
                                Educational and Work Background
                            </div>
                            <div class="input-section">

                                <div>
                                    <label for="work-experience">Total Working Experience</label>
                                    <input type="text" name="work-experience" id="work-experience" value="0" required>
                                </div>

                                <div>
                                    <label for="employment-status">Employment Status</label>
                                    <select name="employment-status" id="employment-status">
                                        <option value="">Select</option>
                                        <option value="Full-Time Employee">Full-Time Employee</option>
                                        <option value="Part-Time Employee">Part-Time Employee</option>
                                        <option value="Contractor/Freelancer">Contractor/Freelancer</option>
                                        <option value="Temporary Employee">Temporary Employee</option>
                                        <option value="Intern">Intern</option>
                                        <option value="Consultant">Consultant</option>
                                        <option value="Remote/Telecommuting Employee">Remote/Telecommuting Employee
                                        </option>
                                        <option value="Seasonal Employee">Seasonal Employee</option>
                                        <option value="Probationary Employee">Probationary Employee</option>
                                        <option value="Freelancer/Gig Worker">Freelancer/Gig Worker</option>
                                        <option value="Volunteer">Volunteer</option>
                                        <option value="Retiree/Consultant">Retiree/Consultant</option>
                                        <option value="Unemployee">Unemployed</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="current-organization">Current Working Organization</label>
                                    <input type="text" name="current-organization" id="current-organization" required>
                                </div>

                                <div>
                                    <label for="educational-status">Educational Status</label>
                                    <select name="educational-status" id="educational-status">
                                        <option value="">Select</option>
                                        <option value="Enrolled in High School">Enrolled in High School</option>
                                        <option value="High School Graduate">High School Graduate</option>
                                        <option value="Enrolled in College/University">Enrolled in College/University
                                        </option>
                                        <option value="College/University Graduate">College/University Graduate</option>
                                        <option value="Enrolled in Master's/Ph.D. Program">Enrolled in Master's/Ph.D.
                                            Program</option>
                                        <option value="Master's/Ph.D. Degree Holder">Master's/Ph.D. Degree Holder
                                        </option>
                                        <option value="Vocational/Trade School Student">Vocational/Trade School Student
                                        </option>
                                        <option value="Vocational/Trade School Graduate">Vocational/Trade School
                                            Graduate</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="field-of-study">Field of Studies</label>
                                    <select name="field-of-study" id="field-of-study">
                                        <option value="">Select</option>
                                        <option value="Civil Engineering">Civil Engineering</option>
                                        <option value="Electrical Engineering">Electrical Engineering</option>
                                        <option value="Mechanical Engineering">Mechanical Engineering</option>
                                        <option value="Computer Engineering">Computer Engineering</option>
                                        <option value="Chemical Engineering">Chemical Engineering</option>
                                        <option value="Aerospace Engineering">Aerospace Engineering</option>
                                        <option value="Industrial Engineering">Industrial Engineering</option>
                                        <option value="Biology">Biology</option>
                                        <option value="Chemistry">Chemistry</option>
                                        <option value="Physics">Physics</option>
                                        <option value="Mathematics">Mathematics</option>
                                        <option value="Geology">Geology</option>
                                        <option value="Environmental Science">Environmental Science</option>
                                        <option value="Sociology">Sociology</option>
                                        <option value="Psychology">Psychology</option>
                                        <option value="Anthropology">Anthropology</option>
                                        <option value="Economics">Economics</option>
                                        <option value="Political Science">Political Science</option>
                                        <option value="International Relations">International Relations</option>
                                        <option value="Geography">Geography</option>
                                        <option value="Business Administration">Business Administration</option>
                                        <option value="Marketing">Marketing</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Accounting">Accounting</option>
                                        <option value="Human Resource Management">Human Resource Management</option>
                                        <option value="Entrepreneurship">Entrepreneurship</option>
                                        <option value="Medicine">Medicine</option>
                                        <option value="Nursing">Nursing</option>
                                        <option value="Pharmacy">Pharmacy</option>
                                        <option value="Public Health">Public Health</option>
                                        <option value="Medical Laboratory Technology">Medical Laboratory Technology
                                        </option>
                                        <option value="Agriculture">Agriculture</option>
                                        <option value="Animal Science">Animal Science</option>
                                        <option value="Horticulture">Horticulture</option>
                                        <option value="Agribusiness">Agribusiness</option>
                                        <option value="Educational Psychology">Educational Psychology</option>
                                        <option value="Curriculum and Instruction">Curriculum and Instruction</option>
                                        <option value="Early Childhood Education">Early Childhood Education</option>
                                        <option value="Educational Leadership">Educational Leadership</option>
                                        <option value="Law">Law</option>
                                        <option value="International Law">International Law</option>
                                        <option value="Criminal Justice">Criminal Justice</option>
                                        <option value="Fine Arts">Fine Arts</option>
                                        <option value="Music">Music</option>
                                        <option value="Performing Arts">Performing Arts</option>
                                        <option value="Visual Arts">Visual Arts</option>
                                        <option value="English Literature">English Literature</option>
                                        <option value="Amharic Literature">Amharic Literature</option>
                                        <option value="Linguistics">Linguistics</option>
                                        <option value="Foreign Languages">Foreign Languages</option>
                                        <option value="Computer Science">Computer Science</option>
                                        <option value="Information Systems">Information Systems</option>
                                        <option value="Software Engineering">Software Engineering</option>
                                        <option value="Architecture">Architecture</option>
                                        <option value="Urban Planning">Urban Planning</option>
                                        <option value="Interior Design">Interior Design</option>
                                        <option value="Journalism">Journalism</option>
                                        <option value="Mass Communication">Mass Communication</option>
                                        <option value="Media Studies">Media Studies</option>
                                        <option value="Environmental Management">Environmental Management</option>
                                        <option value="Conservation Biology">Conservation Biology</option>
                                        <option value="Renewable Energy">Renewable Energy</option>
                                        <option value="Public Administration">Public Administration</option>
                                        <option value="Development Studies">Development Studies</option>
                                        <option value="Gender and Development">Gender and Development</option>
                                        <option value="History">History</option>
                                        <option value="Archaeology">Archaeology</option>
                                        <option value="Social Work">Social Work</option>

                                    </select>
                                </div>

                                <div>
                                    <label for="cgpa">CGPA</label>
                                    <input type="text" name="cgpa" id="cgpa" required>
                                </div>

                                <div>
                                    <label for="grad-year">Year of Graduation</label>
                                    <input type="number" name="grad-year" id="grad-year" required>
                                </div>

                                <div>
                                    <label for="institution-name">Inistitution Name</label>
                                    <select name="institution-name" id="institution-name">
                                        <option value="">Select</option>
                                        <option value="Addis Ababa University">Addis Ababa University</option>
                                        <option value="Bahir Dar University">Bahir Dar University</option>
                                        <option value="Jimma University">Jimma University</option>
                                        <option value="Mekelle University">Mekelle University</option>
                                        <option value="Hawassa University">Hawassa University</option>
                                        <option value="Adama Science and Technology University">Adama Science and
                                            Technology University</option>
                                        <option value="Haramaya University">Haramaya University</option>
                                        <option value="Dire Dawa University">Dire Dawa University</option>
                                        <option value="Wolkite University">Wolkite University</option>
                                        <option value="Gambella University">Gambella University</option>
                                        <option value="Dessie University">Dessie University</option>
                                        <option value="Debre Markos University">Debre Markos University</option>
                                        <option value="Madda Walabu University">Madda Walabu University</option>
                                        <option value="Wollega University">Wollega University</option>
                                        <option value="Semera University">Semera University</option>
                                        <option value="Wolaita Sodo University">Wolaita Sodo University</option>
                                        <option value="Mizan-Tepi University">Mizan-Tepi University</option>
                                        <option value="Jijiga University">Jijiga University</option>
                                        <option value="Adama University">Adama University</option>
                                        <option value="AAU College of Business and Economics">AAU College of Business
                                            and Economics</option>
                                        <option value="AAU College of Health Sciences">AAU College of Health Sciences
                                        </option>
                                        <option value="AAU College of Law and Governance">AAU College of Law and
                                            Governance</option>
                                        <option value="AAU Institute of Technology">AAU Institute of Technology</option>
                                        <option value="Ethiopian Catholic University">Ethiopian Catholic University
                                        </option>
                                        <option value="Amanuel University">Amanuel University</option>
                                        <option value="Rift Valley University">Rift Valley University</option>
                                        <option value="Ethiopian Civil Service University">Ethiopian Civil Service
                                            University</option>
                                        <option value="Ethiopian Nazarene University">Ethiopian Nazarene University
                                        </option>
                                        <option value="Ethiopian Orthodox Tewahedo Church University">Ethiopian Orthodox
                                            Tewahedo Church University</option>
                                        <option value="Ethiopian Science and Technology University">Ethiopian Science
                                            and Technology University</option>
                                        <option value="International University of Health and Sciences">International
                                            University of Health and Sciences</option>
                                        <option value="Kokebe Mehret University">Kokebe Mehret University</option>
                                        <option value="Nazareth University">Nazareth University</option>
                                        <option value="Rift Valley International University">Rift Valley International
                                            University</option>
                                        <option value="St. Paul's University">St. Paul's University</option>
                                        <option value="Wellington College of Business and Technology">Wellington College
                                            of Business and Technology</option>
                                        <option value="African Beza College">African Beza College</option>
                                        <option value="Atlas Health College">Atlas Health College</option>
                                        <option value="Ayer Tena Health Science College">Ayer Tena Health Science
                                            College</option>
                                        <option value="Blue Nile College">Blue Nile College</option>
                                        <option value="Dangila Andinet Health Science College">Dangila Andinet Health
                                            Science College</option>
                                        <option value="Debub Ethiopia College">Debub Ethiopia College</option>
                                        <option value="Durman College">Durman College</option>
                                        <option value="Dynamic International University College">Dynamic International
                                            University College</option>
                                        <option value="Hamlin College of Midwifery">Hamlin College of Midwifery</option>
                                        <option value="Harambe College">Harambe College</option>
                                        <option value="Harar Agrotechnical University">Harar Agrotechnical University
                                        </option>
                                        <option value="Yardsticks International College">Yardsticks International
                                            College</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="apply-section attachments">
                            <div class="form-section-title">
                                Attachments
                            </div>

                            <div class="input-section">
                                <div>
                                    <label for="resume-cv">Resume/CV <span> (pdf,doc,docx,txt)</span> *</label>
                                    <input type="file" name="resume-cv" id="resume-cv" accept=".pdf,.doc,.docx,.txt" required>
                                </div>

                                <div>
                                    <label for="cover-letter">Cover Letter <span> (pdf,doc,docx,txt)</span> *</label>
                                    <input type="file" name="cover-letter" id="cover-letter" accept=".pdf,.doc,.docx,.txt" required>
                                </div>

                                <div>
                                    <label for="apply-image">Photo <span>(optional)</span></label>
                                    <input type="file" name="apply-image" id="apply-image" accept="image/*">
                                </div>
                            </div>

                        </div>

                        <button>
                            Apply
                        </button>

                        <!-- <input type="submit" name="" id="" value="Apply"> -->
                    </form>
                </div>

            </div>
        </div>
    </main>

    <div id="footerPlaceholder"></div>
    <script src="js/footer.js"></script>

    <script src="js/behavior.js"></script>
</body>

</html>