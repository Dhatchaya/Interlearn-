<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

    <div class="center-body">
    <?php $this->view("includes/sidebar");?>
        <div class="clm2">
            <h2 class="add_heading_init">Enquiry</h2>
          
            <button type="button" data-modal-target= "#modal" class="Add_enq" onclick=addEnquiry(); >+ Add Enquiry</button>
            <?=$some?>
                    <!-- add form -->
            <div class="modal1" id="modal1" >
            
            <form method= "POST" class= "enq_form"  >
                <div class = "form-header">
                <h2 class="enq_heading" id="enq_heading"><?= $enquiry_title ?></h2>
                <button type="button" onclick=closeEnquiry();  data-close-button class ="close-btn">&times;</button>
                </div>
            
                <lable for= "category">Category</lable></br>
                <select name = "type" class="enq_cat">
                    <option value = "" selected>--</option>
                    <option value = "personal">Personal</option>
                    <option value = "suggestion">General Suggestion</option>
                    
                </select></br>
                <lable for= "title">Title</lable></br>
                <input type = "text" name ="title" class="enq_title"/></br>
                <lable for= "Subject">Description</lable></br>
                <textarea id="sub" name="content" rows="8" cols="50" placeholder="Type your concern"></textarea></br>  
                <input type = "submit" id ="sub_btn" class ="sub_btn" name="submit" value="Submit" />

        

            </form>
        </div>
        <!-- edit form -->
            <div class="modal " id="modal" >
            
                <form method= "POST" class= "enq_form" id="enq_form2" >
                    <div class = "form-header">
                    <h2 class="enq_heading" id="enq_heading2"></h2>
                    <button type="button" onclick=closeEnquiry();  data-close-button class ="close-btn">&times;</button>
                    </div>
                
                    <lable for= "category">Category</lable></br>
                    <select name = "edittype" class="enq_cat">
                        <option value = "" selected>--</option>
                        <option value = "personal">Personal</option>
                        <option value = "suggestion">General Suggestion</option>
                        
                    </select></br>
                    <lable for= "title">Title</lable></br>
                    <input type = "text" name ="edittitle" class="enq_title"/></br>
                    <lable for= "Subject">Description</lable></br>
                    <textarea id="sub" name="editcontent" rows="8" cols="50" placeholder="Type your concern"></textarea></br>  
                    <input type = "submit" id ="sub_btn" class ="sub_btn" name="editsubmit" value="save" />


                </form>
            </div>
 
                    <table border= 1 class='enq_tbl'>
                        <tr>
                            <th>Enquiry No</th>
                            <th>Subject</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Enquiry Date</th>
                            <th>Actions</th>
                        </tr>
 
                        <?php if(!empty($rows)):?>
                    
                        <?php foreach($rows as $row):?>
                            
                        <tr>
                            <td><?=esc($row->eid)?></td>
                            <td><?=esc($row->title)?></td>
                            <td><?=esc($row->type)?></td>
                            <td><?=esc($row->status)?></td>
                            <td><?=esc($row->date)?></td>
                            <td>
                            
                            <div class="enq_actions">
                            <div class="enq_edit" onclick=editEnquiry(<?=esc($row->eid)?>);>
                                <!-- <a href="<?=ROOT?>/student/enquiry/edit/<?=esc($row->eid)?>"> -->
                                    <img  src= "<?=ROOT?>/assets/images/edit.png"/>
                                <!-- </a> -->
                            </div>
                            <div class="enq_delete">
                                <a href="<?=ROOT?>/student/enquiry/delete/<?=esc($row->eid)?>">
                                    <img src= "<?=ROOT?>/assets/images/delete.png"/>
                                </a>
                                </div>
                            <div class="enq_view">
                                <a href="<?=ROOT?>/student/enquiry/view/<?=esc($row->eid)?>">
                                    <img src= "<?=ROOT?>/assets/images/view.png"/>
                                </a>
                                </div>
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
    <div  id="overlay"></div>
    <script defer src="<?=ROOT?>/assets/js/enquiry.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>

