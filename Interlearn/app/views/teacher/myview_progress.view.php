<?php $this->view("includes/header"); ?>
<div class="main-body-div">
    <?php $this->view("includes/sidebar_teach"); ?>
    <div class="top-to-bottom-content">
        <?php $this->view("includes/nav"); ?>
        

<head>
    
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles1.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles3.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles6.css">
</head>
<div class="mid-container">
    
    <div class="do_quiz_rig">
        <h3>Student marks according to the exam</h3>
        <table class="progress_tbl">
            <thread>
                <tr>
                    <th>ID</th>
                    <th>Student Number</th>
                    <th>Marks</th>
                    <!-- <th>Actions</th> -->
                </tr>
            </thread>
            <tbody>
                <?php if(!empty($rows2)):?>
            
                <?php foreach($rows2 as $row):?>
                    
                <tr>
                    <td><?=esc($row->id)?></td>
                    <td><?=esc($row->studentID)?></td>
                    <td><?=esc($row->marks)?></td>
                    <!-- <td>
                        <div class="edit_delete">
                            <div class="edit" onclick=editQuestion(<?=esc($row->id)?>)>
                                <button onclick="toModal(<?=esc($row->marks)?>)">edit</button>
                            </div>
                            <div class="delete">
                                <a href="<?=ROOT?>/instructor/course/progress/<?=esc($course_id)?>/1/delete?qnum=<?=esc($row->id)?>"><button>delete</button></a>
                            </div>
                        </div>
                        
                    </td> -->
                </tr>
                <?php endforeach;?>
                <?php else:?>
                <tr><td colspan="15">No records found!</td></tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
     
<?php $this->view("includes/footer");?>