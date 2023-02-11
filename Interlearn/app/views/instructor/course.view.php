<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="teacher_crs_container">
<?php $this->view("includes/sidebar_ins");?>
<div class="teacher_crs_main">
    <div class="teacher_crs_content">
        <img src="<?=ROOT?>/assets/images/tchrview.png" class="teacher_crs_topimg">
        <div class="teacher_crs_tophead">
            <h2 class="teacher_crs_subject">Mathematics</h2>
            <div class="teacher_crs_dropdown">
                <img src="<?=ROOT?>/assets/images/settings.png" class="teacher_crs_imgset">
                <div class="teacher_crs_dropdown-content">
            
                  <a href="<?=ROOT?>/instructor/quizz">Add Quiz</a>
                  <a href="<?=ROOT?>/instructor/submission">Add Submission</a>
                </div>
            </div>
        </div>
    </div>
        <div class="teacher_crs_content2">
            <a href="#"><img src="<?=ROOT?>/assets/images/forum.png" class="teacher_crs_img">Forum</a> </br></br>
           
            <a href="#"><img src="<?=ROOT?>/assets/images/fdb.png" class="teacher_crs_img">Feedback Form</a> </br></br>
           <br><hr><br>

            <h4>Day 1</h4><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/rec.png" class="teacher_crs_img"></img>Recording</a> </br></br>
            
            <a href="#"><img src="<?=ROOT?>/assets/images/pdf.png" class="teacher_crs_img">Lesson 1</a> </br></br>
            
            <a href="#"><img src="<?=ROOT?>/assets/images/pp.png" class="teacher_crs_img">Past Paper 2020</a> </br></br>
            
            <a href="#"><img src="<?=ROOT?>/assets/images/hw.png" class="teacher_crs_img">Home work 1</a> </br></br>
           <hr><br>

            <h4>Day 2</h4><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/rec.png" class="teacher_crs_img">Recording</a> </br></br>
            
            <a href="#"><img src="<?=ROOT?>/assets/images/pdf.png" class="teacher_crs_img">Lesson 2</a> </br></br>
            
            <a href="#"><img src="<?=ROOT?>/assets/images/pp.png" class="teacher_crs_img">Past Paper 2019</a> </br></br>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="edit.png" class="teacher_crs_img2"></a> </br></br><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/hw.png" class="teacher_crs_img">Home work 2</a> </br></br>
           <hr><br>

            <h4>Day 3</h4><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/rec.png" class="teacher_crs_img">Recording</a> </br></br>
            
            <a href="#"><img src="<?=ROOT?>/assets/images/pdf.png" class="teacher_crs_img">Lesson 2-Part B</a> </br></br>
            
            <a href="#"><img src="<?=ROOT?>/assets/images/pp.png" class="teacher_crs_img">Past Paper 2021</a> </br></br>
            
            <a href="#"><img src="<?=ROOT?>/assets/images/hw.png" class="teacher_crs_img">Home work 3</a> </br></br>
           <hr><br>

            <h4>Day 4</h4><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/rec.png" class="teacher_crs_img">Recording</a> </br></br>
            
            <a href="#"><img src="<?=ROOT?>/assets/images/pdf.png" class="teacher_crs_img">Lesson 3-Part A</a> </br></br>
            
            <a href="#"><img src="<?=ROOT?>/assets/images/pp.png" class="teacher_crs_img">Past Paper 2018</a> </br></br>
            
            <a href="#"><img src="<?=ROOT?>/assets/images/hw.png" class="teacher_crs_img">Home work 4</a> </br></br>
            
        </div>
    </div>    
</div>

<?php $this->view("includes/footer");?>