<?php $this->view("includes/header"); ?>
<div class="main-body-div">
    <?php $this->view("includes/sidebar"); ?>
    <div class="top-to-bottom-content">
        <?php $this->view("includes/nav"); ?>
        <div class="all-middle-content">
            <div class="std-announcement-container">

                <div class="recp_ann_content">
                    <h2 class="std_view_text">Announcements</h2><br>
                    <div class="std_view_box">
                        <?php if (!empty($announcements)) : ?>
                            <?php foreach ($announcements as $row) : ?>
                                <div class="ann_view_msg">
                                    <h3><?= $row->title ?></h3>
                                    <h5>Grade <?= esc($row->grade) ?> - <?= esc($row->subject) ?> (<?= esc($row->language_medium) ?> Medium)</h5><br>
                                    Dear Students,<br>
                                    <p><?= $row->content ?></p><br>
                                    <a href="<?= $row->attachment ?>"><?= $row->file_name ?></a>
                                    <br><br>
                                    <p class="recp_ann_bot"><?= esc($row->fullname) ?></p>
                                    <p class="recp_ann_bot"><?= $row->date_time ?></p><br>
                                </div><br>
                            <?php endforeach; ?>
                        <?php endif ?>
                    </div>
                </div><br><br>
            </div>
        </div>
    </div>
</div>
<?php $this->view("includes/footer"); ?>