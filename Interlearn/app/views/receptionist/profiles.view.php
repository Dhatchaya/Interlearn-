<?php $this->view("includes/header");?>


<div class="main-body-div">
    <?php $this->view("includes/sidebar_recep");?>
    <div class="top-to-bottom-content">

        <?php $this->view("includes/nav");?>

    <div class="clm2 marginlow">

      
        <div class="studentDetails">
            <!-- <div class= "enq_full_body2">
                 <h4 class="add_heading2">Student details</h4>
            </div> -->
                <?php if(!empty($student)):?>
                <div class = "StudentDetailsContent">
                <div class="display_picture_div">
                <img src="<?=ROOT?>/uploads/images/<?=esc($student[0]->display_picture)?>" alt="profile" class="img_display_prof"></br>
                <span class="name_dis_prof"><?=esc($student[0]->first_name)?> <?=esc($student[0]->last_name)?></span>
                </div>
                <div class="studentDetailsdiv">
                    <h2 class="reg_details_head"> Student Details </h2>
                   
                    <h3 class="reg_details_body">StudentID :   <?=esc($student[0]->studentID)?></h3> <br/>
                    <h3 class="reg_details_body">NIC :   <?=esc($student[0]->NIC)?> </h3><br/>
                    <h3 class="reg_details_body">First name :   <?=esc($student[0]->first_name)?> </h3><br/>
                    <h3 class="reg_details_body">Last name :   <?=esc($student[0]->last_name)?> </h3><br/>
                    <h3 class="reg_details_body">Birthday :   <?=esc($student[0]->birthday)?> </h3><br/>
                    <h3 class="reg_details_body">Gender :   <?=esc($student[0]->gender)?> </h3><br/>
                    <h3 class="reg_details_body">Email :   <?=esc($student[0]->email)?> </h3><br/>
                    <h3 class="reg_details_body">Mobile Number:   <?=esc($student[0]->mobile_number)?> </h3><br/>
                    <h3 class="reg_details_body">Address :  <?=esc($student[0]->address)?> </h3><br/>
                    <h3 class="reg_details_body">School :   <?=esc($student[0]->school)?> </h3><br/>
                </div>
                <div class="parentDetails">
                    <h2 class="reg_details_head"> Parent/Guardian Details </h2>
                    <h3 class="reg_details_body">Parent Name :   <?=esc($student[0]->parent_name)?> </h3><br/>
                    <h3 class="reg_details_body">Parent Email :   <?=esc($student[0]->parent_email)?> </h3><br/>
                    <h3 class="reg_details_body">Parent Mobile :   <?=esc($student[0]->parent_mobile)?> </h3><br/>
           
                    <h2 class="reg_details_head"> Course Details </h2>
                    <h3 class="reg_details_body">Grade :   <?=esc($student[0]->grade)?> </h3><br/>
                   
                           
                    <?php foreach($student as $row):?>
                
                    <h3 class="reg_details_body">Course: <?=esc($row->subject)?> - <?=esc($row->fullname)?>  </h3><br/>
                    <?php endforeach;?>
   
                   
                </div>
            </div>
 
        <?php else:?>
            <h3> No details avaialble!</h3>
        <?php endif?>
        </div>
            
        
    </div>  
    </div>  
    </div>
    <script defer src="<?=ROOT?>/assets/js/Registrations.js?v=<?php echo time(); ?>">

</script>
<?php $this->view("includes/footer");?>

