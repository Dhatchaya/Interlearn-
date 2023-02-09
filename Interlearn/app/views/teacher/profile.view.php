<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<?php if(!empty($row)):?>
    <div class="teacher_profile_heading">
            <h2>Teacher Profile Settings</h2>
        </div>
<div class="teacher_profile_container">
        <?php $this->view("includes/sidebar");?>
        
        <div class="teacher_profile_rectangle">
            <div class="teacher_profile_content">
                <img src="<?=ROOT?>/assets/images/teacher.png" class="teacher_profile_image" alt="" srcset="">
                <h3 class="teacher_profile_name"><?=esc($row->first_name)?> <?=esc($row->last_name)?></h3>
            </div>
            <div class="teacher_profile_content2">
                <img src="<?=ROOT?>/assets/images/edit.png" class="teacher_profile_edit" alt="" srcset="">
                <p><input class= "teacher_profile_pic" type="file" name="display_picture" placeholder = "Change Profile Picture" /></p>
            </div>
            <hr>
            <div class="teacher_profile_form">
                <form action="">
                    
                    <label class="teacher_profile_label" for="fname">First Name: </label>
                    <input type="text" class="teacher_profile_field" value="<?=esc($row->first_name)?>"><br><br>
                    <label class="teacher_profile_label" for="lname">Last Name: </label>
                    <input type="text" class="teacher_profile_field" value="<?=esc($row->last_name)?>"><br><br>
                    <label class="teacher_profile_label" for="lname">User Name: </label>
                    <input type="text" class="teacher_profile_field" value="<?=esc($row->username)?>"><br><br>
                    <label class="teacher_profile_label" for="email">Email: </label>
                    <input type="email" class="teacher_profile_field" value="<?=esc($row->email)?>"><br><br>

                    <label class="teacher_profile_label" for="address">Residential Address: </label>
                    <input type="text" class="teacher_profile_field" value="<?php echo(esc($row->Addressline1)." ".esc($row->Addressline2))?>"><br><br>

                    
                    <br>
                    
            

                    <label class="teacher_profile_label" for="num">Mobile Number:</label>
                    <input type="text" class="teacher_profile_field" value="<?=esc($row->mobile_no)?>"><br><br>

                    <input type="button" value="Save" class="profile_submit_btn">
                    
                </form>
            </div>
        </div>
    </div>

    <?php else:?>
        <div>
            That profile was not found
        </div>
    <?php endif;?>
    <?php $this->view("includes/footer");?>