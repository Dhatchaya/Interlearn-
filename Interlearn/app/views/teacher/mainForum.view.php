<?php $this -> view('includes/header'); ?>


<div class="main-body-div">
<?php  if(Auth::getrole() == "Teacher"):?>
            <?php $this->view("includes/sidebar_teach");?>
    <?php else:?>
        <?php if(Auth::getrole() == "Instructor"):?>
            <?php $this->view("includes/sidebar_ins");?>
    <?php endif;?>
    <?php endif;?>
    <div class="forum_body top-to-bottom-content">
    <?php $this -> view('includes/nav'); ?>
    <div class="mainforum_discussion">
    <div class = "mainforum_heading">
        <h2 class="add_heading_init">Grade <?=esc($course->grade)?> - <?=esc($course->subject)?></h2>
       
    </div>
    <div class = "add_view">
        <div class="main_discussion" id="main_discussion">
            <form method= "POST" enctype="multipart/form-data" >
                <label class="mainforum_subject" for="fsubject"> Subject: </label></br>
                <?php if(!empty($errors['subject'])):?>
                <p class="warning"><?=esc($errors['subject'])?></p>
                <?php endif;?>
                <input type ="text" id="subject" name="subject"/>
              </br>
                <label class="mainforum_subject" for="fsubject"> Description: </label></br>
                <?php if(!empty($errors['description'])):?>
                <p class="warning"><?=esc($errors['description'])?></p>
                <?php endif;?>
                <textarea id="descrip" class="mainforumdes" name="description" rows="15" cols="100"></textarea>

                </br></br>
                <input type ="submit" id = "mainforumsub" name = "submit" class = "home_form_sbt mainforum_right" value="Submit"/>
    
            </form>
        </div>
     
       
        

        </div>
    </div>


</div>
</div>
<script defer src="<?=ROOT?>/assets/js/mainforumedit.js?v=<?php echo time(); ?>"></script>
<?php $this -> view('includes/footer'); ?>