<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="recp_ann_container">
<?php $this->view("includes/sidebar_recep");?>
    <div class="recp_ann_content">
        <a href="<?=ROOT?>/receptionist/announcement/add">
            <button class="recp_cl_btn">+Add Announcements</button><br><br>
        </a>
        <br>
        <div class="std_view_announcement">
            <h2 class="std_view_text">Announcements</h2><br>
            <div class="std_view_box">
            <?php if(!empty($announcements)):?>
                    <?php foreach($announcements as $row):?>
                <div class="std_view_msg">
                
                    <!-- <h5>Mr. Edward</h5>
                    <h5>Mathematics</h5><br> -->
                    <h3><?=$row->title?></h3>
                    <h5>Grade <?=esc($row->grade)?> - <?=esc($row->subject)?> (<?=esc($row->language_medium)?> Medium)</h5><br>
                    Dear Students,<br>
                    <p><?=$row->content?></p><br><br>
                    <p class="recp_ann_bot"><?=esc($row->fullname)?></p>
                    <p class="recp_ann_bot"><?=$row->date?></p><br>
                    
                </div><br>
                <?php endforeach;?>
                <?php endif?>
            </div>
        </div>
    </div>
</div>

<?php $this->view("includes/footer");?>