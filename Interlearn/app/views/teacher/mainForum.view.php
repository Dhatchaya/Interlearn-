<?php $this -> view('includes/header'); ?>


<div class="main-body-div">
<?php $this -> view('includes/sidebar'); ?>
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
                <input type ="text" name="subject"/></br>
                <label class="mainforum_subject" for="fsubject"> Description: </label></br>
                <textarea id="descrip" class="mainforumdes" name="description" rows="15" cols="100"></textarea></br></br>
                <!-- <label class="forum_subject" for="fsubject"> Attachments: </label></br></br>
                <input type ="file" class = "file_attachment" name="attachment" /></br></br> -->
                <input type ="submit" name = "submit" class = "home_form_sbt mainforum_right" value="Submit"/>
    
            </form>
        </div>
     
       
        

        </div>
    </div>


</div>
</div>

<?php $this -> view('includes/footer'); ?>