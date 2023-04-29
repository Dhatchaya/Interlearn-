<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="recp_ann_container">
<?php $this->view("includes/sidebar_recep");?>
    <div class="recp_ann_content">
        <a href="<?=ROOT?>/teacher/course/announcement/<?=$course_id?>/0/add">
            <button class="recp_cl_btn">+Add Announcements</button><br><br>
        </a>
        <br>
        <div class="recp_view_announcement">
            <h2 class="std_view_text">Announcements</h2><br>
            <div class="std_view_box">
                <?php if(!empty($announcements)):?>
                <?php foreach($announcements as $row):?>
                <div class="ann_view_msg">
                    
                    <?php 
                        $expiryTime = strtotime($row->date_time) + 60*60; // expiry time is 1 hour after creation
                        $currentTime = time(); //timestap
                        if($expiryTime > $currentTime):?>
                            <img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2" id="button30" onclick="openModal3('<?=($row->aid)?>')">
                    <?php else :?>
                        <?php echo "Editing is no longer allowed for this record.";?>
                    <?php endif; ?>
                    
                    <img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2" id="button33" onclick="openModal6('<?=($row->aid)?>')">
                


            <!-- updating announcement details -->
            <div id="profileModal3" class="popupModal">
                <div class="tchr-popupmodal-content3">
                    <span class="ann_close" onclick="closeModal3()">&times;</span><br>
                    <h4>--Edit Announcement--</h4><br>
                    <form action="" method="post" class="up-profile">
                        <div class="teacher-crs-activities2">
                            <input type="hidden" value="" name="aid" id="aid">
                            <label for="">Announcement name: </label><br>
                            <input type="text" class="edit_ann_name" name="title" value="<?=$row->title?>"><br><br>
                            <label for="">Content: </label><br>
                            <input id="content" name="content" class="edit_ann_cont" value="<?=$row->content?>"><br><br>
                            <label for="">Attach Files: </label><br>
                            <input type="file" class="edit_ann_name" name="attachment" value="<?=$row->attachment?>">
                            <div class="teacher-announcement-edit">
                                <?=esc($row->file_name)?>
                                <span class="announcement-edit-close">&times;</span>
                            </div><br>
                            <button type="submit" class="teacher_upl_btn" name="edit-announcement" id="add-btn">Save</button>
                            <button type="reset" class="teacher_upl_btn" id="cancel-btn">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>


            <!-- deleting the upload popup -->
            <div id="profileModal6" class="popupModal">
                <div class="tchr-popupmodal-content2">
                    <span class="ann_close" onclick="closeModal6()">&times;</span><br>
                    <h4>--Delete Announcement--</h4><br>
                    <form action="" method="post" class="up-profile">
                        <div class="teacher-crs-activities2">
                            <label for="delete-upload" class="teacher-edit">Are you sure you want to delete this announcement? </label>
                            <input type="hidden" value="" name="delete-aid" id="delete-aid">
                            <br><br>
                            <button type="submit" class="teacher_upl_btn" name="delete-announcement" id="add-btn">Yes</button>
                            <button type="reset" class="teacher_upl_btn" id="cancel-btn">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>

                    <h3><?=$row->title?></h3>
                    <br>
                    Dear Students,<br>
                    <p><?=$row->content?></p><br>
                    
                    <div class="recp_ann_attachment">
                        <a href="">
                        <?=esc($row->attachment)?>
                        </a>
                    </div><br>
                    <p class="recp_ann_bot"><?=esc($row->fullname)?></p>
                    <p class="recp_ann_bot"><?=$row->date_time?></p><br>
                    
                </div><br>
                <?php endforeach;?>
                <?php endif?>
            </div>
        </div>
    </div>
</div>
<script defer src="<?=ROOT?>/assets/js/announcement.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>