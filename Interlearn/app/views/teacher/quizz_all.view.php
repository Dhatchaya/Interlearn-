<?php $this->view("includes/header"); ?>
<div class="main-body-div">
    <?php $this->view("includes/sidebar_teach"); ?>
    <div class="top-to-bottom-content">
        <?php $this->view("includes/nav"); ?>
        <div class="all-middle-content">
<head>

</head>
<div class="mid-container">
    <div class="quizz_left">
        <?php $this -> view('includes/sidebar_teach'); ?>
    </div>
    <div class="quizz_right">
        <table border = 1 class='enq_tbl'>
            <tr>
                <th class="eno">Question ID</th>
                <th>Question</th>
                <th>Choice - 1</th>
                <th>Choice - 1 Mark</th>
                <th>Choice - 2</th>
                <th>Choice - 2 Mark</th>
                <th>Choice - 3</th>
                <th>Choice - 3 Mark</th>
                <th>Choice - 4</th>
                <th>Choice - 4 Mark</th>
                <th class="enq_action_clm">Actions</th>
            </tr>

            <?php if(!empty($rows)):?>
        
            <?php foreach($rows as $row):?>
                
            <tr>
                <td><?=esc($row->question_number)?></td>
                <td><?=esc($row->question_title)?></td>
                <td><?=esc($row->choice1)?></td>
                <td><?=esc($row->choice1_mark)?></td>
                <td><?=esc($row->choice2)?></td>
                <td><?=esc($row->choice2_mark)?></td>
                <td><?=esc($row->choice3)?></td>
                <td><?=esc($row->choice3_mark)?></td>
                <td><?=esc($row->choice4)?></td>
                <td><?=esc($row->choice4_mark)?></td>
                <td>
                    <div class="enq_actions">
                        <div class="enq_edit"  <?php if($row->status == 'pending'):?> onclick=editEnquiry(<?=esc($row->eid)?>) <?php else:?> style="display:none" <?php endif;?>>
                            <button class="edit_enq_btn">Edit</button>
                        </div>
                        <div class="enq_delete">
                            <a href="<?=ROOT?>/academic/enquiry/delete/<?=esc($row->eid)?>">
                            <button class="delete_enq_btn">Delete</button>
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach;?>
            <?php else:?>
            <tr><td colspan="15">No records found!</td></tr>
            <?php endif;?>
        </table>
        <p>Hello I'm all</p>
    </div>
</div>
        </div></div></div>
<?php $this -> view('includes/footer'); ?>