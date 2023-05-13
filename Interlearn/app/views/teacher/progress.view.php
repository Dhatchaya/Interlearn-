<?php $this->view("includes/header"); ?>
<div class="main-body-div">
    <?php $this->view("includes/sidebar_teach"); ?>
    <div class="top-to-bottom-content">
        <?php $this->view("includes/nav"); ?>
        <div class="all-middle-content">

<head>

    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles1.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles3.css">
</head>
<div class="mid-container">

    <div class="do_quiz_rig">
        <h1>Progess</h1>
        <p>Here, you can view progresses of each exams </p>
        <br>
        <?php if(!empty($rows)):?>
            <div class="pro_view_container">
                <?php foreach($rows as $row):?>
                <div class="progress">
                    <h2><?=esc($row->exam_name)?></h2>
                    <a href="<?=ROOT?>/Teacher/course/progress/<?=esc($course_id)?>/0/view?overall=<?=esc($row->exam_id)?>"><button>view</button></a>
                </div>

                <?php endforeach;?>
            </div>

            <?php else:?>
            <h3>No records found!</h3>
        <?php endif;?>
    </div>
</div>
</div>
</div>
</div>
<?php $this->view("includes/footer");?>