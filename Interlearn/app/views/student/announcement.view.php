<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="std-announcement-container">

    <?php $this->view("includes/sidebar")?>

        <div class="std-course-announcement">
            <h3 class="std_view_text">Announcements</h3><br>
            <div class="std-announcement-box">
                <?php if(!empty($announcements)):?>
                    <?php foreach($announcements as $row):?>
                        <div class="std-announcement-msg">
                            <h3><?=$row->title?></h3>
                            <h5>Grade <?=esc($row->grade)?> - <?=esc($row->subject)?> (<?=esc($row->language_medium)?> Medium)</h5><br>
                            Dear Students,<br>
                            <p><?=$row->content?></p><br>
                            <a href=""><?=$row->attachment?></a>
                            <!-- <p><?=$row->attachment?></p> -->
                            <br><br>
                            <p class="recp_ann_bot"><?=esc($row->fullname)?></p>
                            <p class="recp_ann_bot"><?=$row->date_time?></p><br>
                        </div><br>
                    <?php endforeach;?>
                <?php endif?>
            </div>
        </div><br><br>
</div>

<?php $this->view("includes/footer");?>