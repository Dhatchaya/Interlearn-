<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="teacher_profile_container">
<?php $this->view("includes/sidebar_ins");?>
        <div class="teacher_profile_heading">
            <h2>Instructor Profile Settings</h2>
        </div>
        <div class="teacher_profile_rectangle">
            <div class="teacher_profile_content">
                <img src="<?=ROOT?>/assets/images/teacher.png" class="teacher_profile_image" alt="" srcset="">
                <h3 class="name">Viharsha Jayathilake</h3>
            </div>
            <div class="teacher_profile_content2">
                <img src="<?=ROOT?>/assets/images/edit.png" class="teacher_profile_edit" alt="" srcset="">
                <p><a class="teacher_profile_profilepic">Change Picture</a></p>
            </div>
            <hr>
            <div class="teacher_profile_form">
                <form action="">
                    <label for="fname">First Name: </label>
                    <div class="teacher_profile_field"></div><br><br>

                    <label for="lname">Last Name: </label>
                    <input type="text" class="teacher_profile_field"><br><br>

                    <label for="email">Email: </label>
                    <input type="email" class="teacher_profile_field"><br><br>

                    <label for="address">Residential Address: </label>
                    <input type="text" class="teacher_profile_field"><br><br>

                    <div class="teacher_profile_subject">
                        <label for="subject">Subjects: </label>
                        <div class="teacher_profile_sub1"> 
                            <input type="checkbox" name="maths" id="maths">
                            <label for="maths">Mathematics</label><br>
                            <input type="checkbox" name="science" id="science">
                            <label for="science">Science</label><br>
                            <input type="checkbox" name="sinhala" id="sinhala">
                            <label for="sinhala">Sinhala</label><br>
                            <input type="checkbox" name="english" id="english">
                            <label for="english">English</label><br>
                        </div>
                        <div class="teacher_profile_sub2">
                            <input type="checkbox" name="history" id="history">
                            <label for="history">History</label><br>
                            <input type="checkbox" name="it" id="it">
                            <label for="it">O/L ICT</label><br>
                            <input type="checkbox" name="commerce" id="commerce">
                            <label for="commerce">Commerce</label><br>
                            <input type="checkbox" name="geo" id="geo">
                            <label for="geo">Geography</label><br>
                        </div>
                        <div class="teacher_profile_sub3">
                            <input type="checkbox" name="cm" id="cm">
                            <label for="cm">Combined Maths</label><br>
                            <input type="checkbox" name="bio" id="bio">
                            <label for="bio">Biology</label><br>
                            <input type="checkbox" name="phy" id="phy">
                            <label for="phy">Physics</label><br>
                        </div>
                        <div class="teacher_profile_sub4">
                            <input type="checkbox" name="chem" id="chem">
                            <label for="chem">Chemistry</label><br>
                            <input type="checkbox" name="ait" id="ait">
                            <label for="ait">A/L ICT</label><br>
                            <input type="checkbox" name="agri" id="agri">
                            <label for="agri">Agriculture</label>
                        </div>
                    </div>
                    <br>
                    
                    <div >
                        <label for="grade" class="teacher_profile_grade">Grades: </label>
                        <input type="checkbox" name="six" id="six">
                        <label for="six">6</label>
                        <input type="checkbox" name="sev" id="sev">
                        <label for="sev">7</label>
                        <input type="checkbox" name="eight" id="eight">
                        <label for="eight">8</label>
                        <input type="checkbox" name="nine" id="nine">
                        <label for="nine">9</label>
                        <input type="checkbox" name="ten" id="ten">
                        <label for="ten">10</label>
                        <input type="checkbox" name="elev" id="elev">
                        <label for="elev">11</label>
                        <input type="checkbox" name="al" id="al">
                        <label for="al">A/L</label>
                    </div><br>

                    <label for="num">Mobile Number:</label>
                    <input type="text" class="teacher_profile_field"><br><br>

                    <input type="button" value="Save" class="teacher_profile_btn">
                    
                </form>
            </div>
        </div>
    </div>

    <?php $this->view("includes/footer");?>