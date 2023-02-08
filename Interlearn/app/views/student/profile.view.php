<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="std_profile_container">
    <?php $this->view("includes/sidebar");?>
        <div class="std_profile_heading">
            <h2>Profile Settings</h2>
        </div>
        <div class="std_profile_rectangle">
            <div class="std_profile_content">
                <img src="<?=ROOT?>/assets/images/student.png" class="std_profile_image" alt="" srcset="">
                <h3 class="std_profile_name">Danodya Supun</h3>
            </div>
            <div class="std_profile_content2">
                <img src="<?=ROOT?>/assets/images/edit.png" class="std_profile_edit" alt="" srcset="">
                <p><a class="std_profile_profilepic">Change Picture</a></p>
            </div>
            <hr>
            <form action="">
                <div class="std_profile_form">
                    <div>
                        <label for="fname">First Name: </label>
                        <input type="text" class="std_profile_field"><br><br>

                        <label for="lname">Last Name: </label>
                        <input type="text" class="std_profile_field"><br><br>

                        <label for="email">Email: </label>
                        <input type="email" class="std_profile_field"><br><br>

                        <label for="address">Residential Address: </label>
                        <input type="text" class="std_profile_field"><br><br>

                        <label for="school">School: </label>
                        <input type="text" class="std_profile_field"><br><br>
                        
                        <div class="std_profile_grade">
                            
                            <div class="std_profile_grade1">
                                <label for="grade">Grade: </label>
                                <input type="radio" name="grade" id="six">
                                <label for="six">6</label>
                                <input type="radio" name="grade" id="sev">
                                <label for="sev">7</label>
                                <input type="radio" name="grade" id="eight">
                                <label for="eight">8</label>
                            </div>
                            <div class="std_profile_grade2">
                                <input type="radio" name="grade" id="nine">
                                <label for="nine">9</label>
                                <input type="radio" name="grade" id="ten">
                                <label for="ten">10</label>
                                <input type="radio" name="grade" id="elev">
                                <label for="elev">11</label>
                                <input type="radio" name="grade" id="al">
                                <label for="al">A/L</label>
                            </div>
                        </div><br>

                        <label for="num">Mobile Number:</label>
                        <input type="text" class="std_profile_field"><br><br>

                        <label for="htel">Home Tel:</label>
                        <input type="text" class="std_profile_field">
                    </div>
                    <div class="std_profile_parentdet">
                        <h3 class="std_profile_phead">Parent/Guardian Details</h3>
                        <label for="gname">Name: </label>
                        <input type="text" class="std_profile_field"><br><br>

                        <label for="rel">Relationship: </label>
                        <input type="text" class="std_profile_field"><br><br>

                        <label for="panum">Contact Number:</label>
                        <input type="text" class="std_profile_field"><br><br>
                    </div>
                </div>
            </form>
            <br>
            <input type="button" value="Save" class="std_profile_btn">
        </div>
    </div>

    <?php $this->view("includes/footer");?>