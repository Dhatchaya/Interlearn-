<?php $this -> view('includes/header'); ?>
<?php $this -> view('includes/nav'); ?>

  
    <div class="forum_body">
    <?php $this -> view('includes/sidebar'); ?>
    <div class="forum_discussion">
    <div class = "forum_heading">
        <h2 class="add_heading_init">Mathematics grade 11</h2>
        <button type="button" data-modal-target= "#modal" class="Add_forum" id="Add_forum" >+ Add new discussion</button>
    </div>
    <div class = "add_view">
        <div class="new_discussion" id="new_discussion">
            <form method= "POST" >
                <label class="forum_subject" for="fsubject"> Subject: </label></br>
                <input type ="text" name="topic"/></br>
                <label class="forum_subject" for="fsubject"> Description: </label></br>
                <textarea id="descrip" name="content" rows="15" cols="70"></textarea></br></br>
                <input type ="submit" name = "submit" class = "home_form_sbt forum_right" value="Submit"/>
            </form>
        </div>
        
            <table border= 1 class='enq_tbl setWidth'>
                
                    <tr>
                        <th>Topic</th>
                        <th>Created by</th>
                        <th>Last replied</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
        
                    <?php if(!empty($rows)):?>
                    
                    <?php foreach($rows as $row):?>

                    <tr>
                        <td><?=esc($row->topic)?></td>
                        
                        <td><?=esc($row->creator)?></td>
                        <td>Dhatchaya</td>
                        <td><?=esc($row->date)?></td>
                        <td>
                            <div class="enq_view">
                                    <a href="<?=ROOT?>/forums/discussion/<?=esc($row->forum_id)?>">

                                        <button class="view_enq_btn">View</button>
  
                                </div>
                                    </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    <?php else:?>
                    <tr><td colspan="10">No records found!</td></tr>
                    <?php endif;?>
            </table>
        </div>
    </div>


</div>
<script defer src="<?=ROOT?>/assets/js/forum.js?v=<?php echo time(); ?>"></script>
<?php $this -> view('includes/footer'); ?>