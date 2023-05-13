<?php $this -> view('includes/header'); ?>
<?php $this -> view('includes/nav'); ?>
<head>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles3.css">
</head>
<div class="mid-container">
    <div class="quizz_left">
        <?php $this -> view('includes/sidebar_ins'); ?>
    </div>

    <div class="question_right">

    <a href="<?=ROOT?>/Instructor/course/progress/<?=esc($course_id)?>/1/add"><button class="home_myform_sbt">Add New Progress</button></a>
        <?php if(!empty($rows)):?>
        <div class="pro_view_container">
            <?php foreach($rows as $row):?>
            <div class="progress">
                <h2><?=esc($row->exam_name)?></h2>
                <a href="<?=ROOT?>/instructor/course/progress/<?=esc($course_id)?>/1/overview?overall=<?=esc($row->exam_id)?>"><button>view</button></a>
            </div>

            <?php endforeach;?>
        </div>

        <?php else:?>
        <h3>No records found!</h3>
        <?php endif;?>
    </div>

    <!-- </div> -->
</div>

<?php $this -> view('includes/footer'); ?>

<!-- <button></button> -->
            <!-- <td>
                <div class="edit_delete">
                    <div class="edit" onclick=editQuestion(<?=esc($row->question_number)?>)>
                        <button>edit</button>
                    </div>
                    <div class="delete">
                        <a href="<?=ROOT?>/teacher/course/quiz/4/79/delete?qnum=<?=esc($row->question_number)?>"><button>delete</button></a>
                    </div>
                </div>
                
            </td> -->