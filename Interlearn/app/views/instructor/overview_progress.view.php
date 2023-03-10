<?php $this -> view('includes/header'); ?>
<?php $this -> view('includes/nav'); ?>
<head>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles2.css">
</head>
<div class="mid-container">
    <div class="quizz_left">
        <?php $this -> view('includes/sidebar_teach'); ?>
    </div>


        <!-- <a href=""><button>Add Question</button></a> -->
        <div class="header_fixed">
            <table >
                <thread>
                    <tr>
                        <th >ID</th>
                        <th>Student Number</th>
                        <th>Marks</th>
                        <th class="action_clm">Actions</th>
                    </tr>
                </thread>
                <tbody>
                    <?php if(!empty($rows)):?>
                
                    <?php foreach($rows as $row):?>
                        
                    <tr>
                        <td><?=esc($row->id)?></td>
                        <td><?=esc($row->student_id)?></td>
                        <td><?=esc($row->marks)?></td>
                        <td>
                            <div class="edit_delete">
                                <div class="edit" onclick=editQuestion(<?=esc($row->id)?>)>
                                    <button>edit</button>
                                </div>
                                <div class="delete">
                                    <a href="<?=ROOT?>/instructor/course/progress/1/1/delete?qnum=<?=esc($row->id)?>"><button>delete</button></a>
                                </div>
                            </div>
                            
                        </td>
                    </tr>
                    <?php endforeach;?>
                    <?php else:?>
                    <tr><td colspan="15">No records found!</td></tr>
                    <?php endif;?>
                </tbody>
            </table>
        </div>
        <!-- <p>Hello I'm all</p> -->
    </div>
</div>

<?php $this -> view('includes/footer'); ?>