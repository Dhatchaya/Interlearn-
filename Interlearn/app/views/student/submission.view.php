<?php $this->view("includes/header");?>


<div class="main-body-div">
<?php $this->view("includes/sidebar");?>

<div class="std_subm_container top-to-bottom-content">
<?php $this->view("includes/nav");?>

        <div class="std_subm_content">
        <h2><?=esc($subDetails->title)?></h2><br>
            <div class="std_sub_description"> </div>
            <div class="std_subm_outerline">
                <p>Maximum File Size: 5MB</p>
            </div><br>
     
            <p id="error" class="warning"></p><br>

            <!-- <div class ="sub_title_div">
            <lable for= "submission_title">Title</lable></br>
                <input type = "text" name = "submissionTitle" class = "sub_title" id ="sub_title" />
            </div><br/> -->
        <div class="std_sub_form">
          <form method= "POST" enctype="multipart/form-data">
                 <div class="std_sub_input_div">
                 <label for="file">

                      <input type = "file" name = "submission[]" class= "sub_file_input" id="sub_file_input" multiple required/>

          
                        <div>
                        <span class="sub-drag"> Drag & Drop </span>
                        <span class="sub-or"> Or </span>
                          <span class="sub-browse"> Upload your files </span>
                        </div>
                      </label>

                </div>
                <div class="sub-file-list">
                  <!-- <div class="sub-file-item">
                    <span class="sub-file-name"> banner-design.png </span>
                    <button>
                      <img src = "<?=ROOT?>/assets/images/closebtn.png" alt="close btn"/>
                    </button>
                  </div> -->
                </div>
                    <!-- <a href="<?=ROOT?>/student/coursepg"> -->
                    <button type="submit" class="std_subm_btn" id="std_subm_btn">Submit</button>
                    <!-- </a> -->
                    <button type="reset" class="std_subm_btn" id ="std_subm_cl">Cancel</button>
              
          </form>
      </div>
    </div>
</div>
</div>
<!-- <script defer src="<?=ROOT?>/assets/js/submissionEdit.js?v=<?php echo time(); ?>"></script> -->
<script defer src="<?=ROOT?>/assets/js/submission.js?v=<?php echo time(); ?>"></script>

    <?php $this->view("includes/footer");?>