<?php $this->view("includes/header");?>

<div class="main-body-div">

            <?php $this->view("includes/sidebar_recep");?>


    <div class="top-to-bottom-content">
    <?php $this->view("includes/nav");?>
        <div class="clm2">
        <h2 class="add_heading_init">Enquiry</h2>
          
            <!-- tabs -->
            <div id="enq_tab_cont" class= "enq_tabs_container">

            <div id="enq_all" class= "enq_tab active_tab" data-status="all" onclick=setTab(this.id,this);> All </div>
            <div id="enq_resolve" class= "enq_tab" data-status="resolved" onclick=setTab(this.id,this);> Resolved </div>
            <div id="enq_esc" class= "enq_tab" data-status="escalated" onclick=setTab(this.id,this);> Escalated</div>

            </div>
             <!-- end of tabs -->
            <!-- tab content -->
            <div id="enq_tab_content" class= "enq_tab_content">

           
             
         
                <div id="enq_all_content" class= "content-tab"  >
                    <table border= 1 class='enq_tbl'>
                        <tr>
                            <th>Enquiry No</th>
                            <th>Subject</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Enquiry Date</th>
                            <th>UserName</th>
                            <th>Role</th>
                            <th class="enq_action_clm2">Actions</th>
                        </tr>
   
                        <?php if(!empty($rows)):?>

                        <?php foreach($rows as $row):?>
                        <tr>
                            <td><?=esc($row->eid)?></td>
                            <td><?=esc($row->title)?></td>
                            <td><?=esc($row->type)?></td>
                            <td>    
                                <select  id ="status" name = "status" data-eid="<?=esc($row->eid)?>"  onchange= "changeStatus(<?=esc($row->eid)?>,this.value,'<?=strtolower(Auth::getRole())?>');"class="enq_cat enqStatus">
                                <option value = "">Select a status</option>
                                <option value = "pending"  <?php if($row->status== 'pending'){echo "selected";}?>>Pending</option>
                                <option value = "inprogress" <?php if($row->status== 'inprogress'){echo "selected";}?>>In progress</option>
                                <option value = "resolved" <?php if($row->status== 'resolved'){echo "selected";}?>>Resolved</option>
                                <option value = "escalated" <?php if($row->status== 'escalated'){echo "selected";}?>>Escalated</option>
                                </select></br>
                        </td>
                            
                            <td><?=esc($row->date)?></td>
                            <td><?=esc($row->username)?></td>

                            <td><?=esc($row->role)?></td>
                            <td>
                        
                            <div class="enq_actions">
                            <div class="enq_delete">
                            <?php if($row->status== 'resolved'):?>

                                <button class="delete_enq_btn"  onclick ="deletebtnclickrece(<?=esc($row->eid)?>);">Delete</button>

                                </div>
                            <?php endif;?>
                            <div class="enq_view">
                                <a href="<?=ROOT?>/receptionist/enquiry/view/<?=esc($row->eid)?>">
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
                        <!-- inside resolved -->
                <div id="enq_resolve_content" class= "content-tab hide"   > 
                    <table border= 1 class='enq_tbl'>
                            <tr>
                                <th>Enquiry No</th>
                                <th>Subject</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Enquiry Date</th>
                                <th>User</th>
                                <th class="enq_action_clm2">Actions</th>
                            </tr>
    
                            <?php if(!empty($rows)):?>
                            
                            <?php foreach($rows as $row):?>
                            <?php if($row->status == "resolved"):?>
                            <tr>
                                <td><?=esc($row->eid)?></td>
                                <td><?=esc($row->title)?></td>
                                <td><?=esc($row->type)?></td>
                                <td>    
                                    <select  id ="status" name = "status" data-eid="<?=esc($row->eid)?>"  onchange= "changeStatus(<?=esc($row->eid)?>,this.value,'<?=strtolower(Auth::getRole())?>');"class="enq_cat enqStatus">
                                    <option value = "">Select a status</option>
                                    <option value = "pending"  <?php if($row->status== 'pending'){echo "selected";}?>>Pending</option>
                                    <option value = "inprogress" <?php if($row->status== 'inprogress'){echo "selected";}?>>In progress</option>
                                    <option value = "resolved" <?php if($row->status== 'resolved'){echo "selected";}?>>Resolved</option>
                                    <option value = "escalated" <?php if($row->status== 'escalated'){echo "selected";}?>>Escalated</option>
                                    </select></br>
                            </td>
                                
                                <td><?=esc($row->date)?></td>
                                <td><?=esc($row->role)?></td>
                                <td>
                            
                                <div class="enq_actions">
                                <div class="enq_delete">
                                <!-- <a href="<?=ROOT?>/receptionist/enquiry/delete/<?=esc($row->eid)?>"> -->
                                <button class="delete_enq_btn"  onclick ="deletebtnclickrece(<?=esc($row->eid)?>);">Delete</button>
                                <!-- </a> -->
                                </div>
                            <div class="enq_view">
                                <a href="<?=ROOT?>/receptionist/enquiry/view/<?=esc($row->eid)?>">
                                <button class="view_enq_btn">View</button>
                                </a>
                                </div>
                                </div>
                                </td>
                            </tr>
                            <?php endif;?>
                            <?php endforeach;?>
                            <?php else:?>
                            <tr><td colspan="10">No records found!</td></tr>
                            <?php endif;?>
                        </table>
                </div>
           
                <!-- inside escalated -->
                <div id="enq_esc_content" class= "content-tab hide"  > 
                <table border= 1 class='enq_tbl'>
                        <tr>
                            <th>Enquiry No</th>
                            <th>Subject</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Enquiry Date</th>
                            <th>User</th>
                            <th class="enq_action_clm2">Actions</th>
                        </tr>
 
                        <?php if(!empty($rows)):?>
                           
                        <?php foreach($rows as $row):?>
                        <?php if($row->status == "escalated"):?>
                        <tr>
                            <td><?=esc($row->eid)?></td>
                            <td><?=esc($row->title)?></td>
                            <td><?=esc($row->type)?></td>
                            <td>    
                                <select  id ="status" name = "status" data-eid="<?=esc($row->eid)?>"  onchange= "changeStatus(<?=esc($row->eid)?>,this.value,'<?=strtolower(Auth::getRole())?>');"class="enq_cat enqStatus">
                                <option value = "">Select a status</option>
                                <option value = "pending"  <?php if($row->status== 'pending'){echo "selected";}?>>Pending</option>
                                <option value = "inprogress" <?php if($row->status== 'inprogress'){echo "selected";}?>>In progress</option>
                                <option value = "resolved" <?php if($row->status== 'resolved'){echo "selected";}?>>Resolved</option>
                                <option value = "escalated" <?php if($row->status== 'escalated'){echo "selected";}?>>Escalated</option>
                                </select></br>
                        </td>
                            
                            <td><?=esc($row->date)?></td>
                            <td><?=esc($row->role)?></td>
                            <td>
                        
                            <div class="enq_actions">

                            <div class="enq_view">
                                <a href="<?=ROOT?>/receptionist/enquiry/view/<?=esc($row->eid)?>">
                                <button class="view_enq_btn">View</button>
                                </a>
                                </div>
                            </div>
                            </td>
                        </tr>
                        <?php endif;?>
                        <?php endforeach;?>
                        <?php else:?>
                        <tr><td colspan="10">No records found!</td></tr>
                        <?php endif;?>
                    </table>
                </div>
                </div>
            </div>
            <!-- end of tab content -->
        </div>
        <div class="bank-payment-form-popup remove-staff-popup">
        <div class="remove-employee-dialog-box">
            <label class="ask" for="">Are you sure to remove this Enquiry?</label>
            <div class="btn-container">
                <button   class="yes">Yes</button>
                <button onclick="refresh()" class="no">No</button>
            </div>
        </div>
        <div class="success-message">
            <label class="ask" for="refresh">Successfully removed the Student</label>
            <br>
            <div class="btn-container ">
                <button onclick="refresh()" class="refresh"> click to refresh</button>
            </div>
        </div>
    </div>
    </div>  
    <div  id="overlay"></div>
    <script defer src="<?=ROOT?>/assets/js/enquiry.js?v=<?php echo time(); ?>">

</script>
<?php $this->view("includes/footer");?>

