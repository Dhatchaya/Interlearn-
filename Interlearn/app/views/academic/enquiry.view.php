<?php $this->view("includes/header");?>

<div class="main-body-div">
    <?php if(Auth::getrole() == "Student"):?>
        <?php $this->view("includes/sidebar");?>
    <?php else:?>
        <?php  if(Auth::getrole() == "Teacher"):?>
            <?php $this->view("includes/sidebar_teach");?>
    <?php else:?>
        <?php if(Auth::getrole() == "Instructor"):?>
            <?php $this->view("includes/sidebar_ins");?>
    <?php endif;?>
    <?php endif;?>
    <?php endif;?>

    <div class="top-to-bottom-content">
    <?php $this->view("includes/nav");?>

        <div class="clm2">
            <h2 class="add_heading_init">Enquiry</h2>
          
            <button type="button" data-modal-target= "#modal" class="Add_enq" onclick=addEnquiry(); >+ Add Enquiry</button>
            <?=$some?>
                    <!-- add form -->
            <div class="modal1" id="modal1" >
            
            <form method= "POST" class= "enq_form" id="enq_form"  >
                <div class = "form-header">
                <h2 class="enq_heading" id="enq_heading"><?= $enquiry_title ?></h2>
                <button type="button" onclick=closeEnquiry();  data-close-button class ="close-btn">&times;</button>
                </div>
            
                <lable for= "category">Category</lable><p class="warning" id="cate_warning"></p></br>
                <select name = "type" class="enq_cat whiteInput" id="cat_enq">
                    <option value = " " selected>--</option>
                    <option value = "personal">Personal</option>
                    <option value = "suggestion">General Suggestion</option>
                    
                </select></br>
                <lable for= "title">Title</lable><p class="warning" id="titl_warning"></p></br>
                <input type = "text" id="titl_enq" name ="title" class="enq_title whiteInput"/></br>
                <lable for= "Subject">Description</lable><p class="warning" id="desc_warning"></p></br>
                <textarea class="whiteInput" id="sub" name="content" rows="8" cols="50" placeholder="Type your concern"></textarea></br>  
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
                
                    <lable for= "category">Category</lable><p class="warning" id="cate_warning2"></p></br>
                    <select name = "edittype" class="enq_cat whiteInput" id="cat_enq2">
                        <option value = " " selected>--</option>
                        <option value = "personal">Personal</option>
                        <option value = "suggestion">General Suggestion</option>
                        
                    </select></br>
                    <lable for= "title">Title</lable><p class="warning" id="titl_warning2"></p>
                    <input type = "text" id="titl_enq2" name ="edittitle" class="enq_title whiteInput"/></br>
                    <lable for= "Subject">Description</lable><p class="warning" id="desc_warning2"></p>
                    <textarea class="whiteInput" id="sub2" name="editcontent" rows="8" cols="50" placeholder="Type your concern"></textarea></br>  
                    <input type = "submit" id ="sub_btn" class ="sub_btn" name="editsubmit" value="save" />


                </form>
            </div>
 
                    <table border = 1 class='enq_tbl'>
                        <tr>
                            <th class="eno">Enquiry No</th>
                            <th>Subject</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Enquiry Date</th>
                            <th class="enq_action_clm">Actions</th>
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
                            <div class="enq_edit"  <?php if($row->status == 'pending'):?> onclick=editEnquiry(<?=esc($row->eid)?>) <?php else:?> style="display:none" <?php endif;?>>
                              <button class="edit_enq_btn">Edit</button>
                            </div>
                            <div class="enq_delete">
                                <a href="<?=ROOT?>/academic/enquiry/delete/<?=esc($row->eid)?>">
                                <button class="delete_enq_btn">Delete</button>
                                </a>
                                </div>
                            <div class="enq_view">
                                <a href="<?=ROOT?>/academic/enquiry/view/<?=esc($row->eid)?>">
                                <button class="view_enq_btn">View</button>
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
    </div>
    <div  id="overlay"></div>
    <script defer src="<?=ROOT?>/assets/js/enquiry.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>

