<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="recp_ann_container">
<?php $this->view("includes/sidebar_recep");?>
    <div class="recp_ann_content">
        <a href="<?=ROOT?>/receptionist/announcement/add">
            <button class="recp_cl_btn">+Add Announcements</button><br><br>
        </a>
        <br>
        <div class="recp_view_announcement">
            <h2 class="std_view_text">Announcements</h2><br>
            <div class="std_view_box">
                <?php if(!empty($announcements)):?>
                <?php foreach($announcements as $row):?>
                <div class="ann_view_msg">
                    <?php if($editable): ?>
                        <img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2" id="button28" onclick="openModal3('<?=esc($row->aid)?>')">
                    <?php else :?>
                        <!-- <?php echo "Editing is no longer allowed for this record.";?> -->
                    <?php endif; ?>
                    
                    <img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2" onclick="openModal6('<?=esc($row->aid)?>')">
                    <!-- <button class="recp_cl_btn" id="button1">+Add new teacher</button> -->


                    <h3><?=$row->title?></h3><br>
                    Dear Students,<br>
                    <p><?=$row->content?></p><br>

                    <div class="recp_ann_attachment">
                        <a href="">
                        <?=esc($row->file_name)?>
                        </a>
                    </div><br>
                    <p class="recp_ann_bot"><?=$row->date_time?></p><br>

                </div><br>



                <!-- edit announcement popup -->
                <div id="profileModal3" class="popupModal">
                    <div class="popupmodal-content">
                        <span class="ann_close" onclick="closeModal3()">&times;</span>
                        <form action="" method="post" class="up-profile">
                             <label for="">Announcement name: </label><br>
                             <input type="text" class="edit_ann_name" value="<?=esc($row->title)?>" name="title"><br><br>
                             <label for="">Content: </label><br>
                             <textarea id="address" name="address" value="<?=esc($row->content)?>" class="edit_ann_cont"></textarea><br><br>
                             <label for="">Attach Files: </label><br><br>
                             <input type="file" class="edit_ann_name" name="attachment">
                             <span class="instructor-remove" >&times;</span><br>
                            <div class="errors">
                                <span class="form-error"></span>
                            </div>
                            <input type="submit" value="Save Changes" class="recp_cl_btn">
                        </form>
                    </div>
                </div>




                <!-- delete announcement -->
        <div id="profileModal6" class="popupModal">
            <div class="tchr-popupmodal-content2">
                <span class="ann_close" onclick="closeModal6()">&times;</span><br>
                <h4>--Delete Course--</h4><br>
                <form action="" method="post" class="up-profile">
                    <div class="teacher-crs-activities2">
                        <label for="delete-sec" class="teacher-edit">Are you sure you want to delete this announcement? </label>
                        <!-- <input type="text" class="teacher-edit-title" name="title"> -->
                        <input type="hidden" value="" name="delete-announcement" id="delete-announcement">
                        <br><br>
                        <a href="<?=ROOT?>/receptionist/course/view/1/?id=<?=esc($teacher->subject_id)?>">
                        <button type="button" class="teacher_upl_btn" name="submit-delete-announcement" id="add-btn">Yes</button>
                        </a>
                        <button type="reset" class="teacher_upl_btn" id="cancel-btn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
                <?php endforeach;?>
                <?php endif?>
            </div>
        </div>
    </div>
</div>
<script defer src="<?=ROOT?>/assets/js/announcement.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>