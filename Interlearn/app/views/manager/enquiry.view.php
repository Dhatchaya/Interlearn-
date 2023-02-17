<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

    <div class="center-body">
    <?php $this->view("includes/sidebar");?>
        <div class="clm2">
        <h2 class="add_heading_init">Enquiry</h2>
 
                    <table border= 1 class='enq_tbl'>
                        <tr>
                            <th>Enquiry No</th>
                            <th>Subject</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Enquiry Date</th>
                            <th>User</th>
                            <th>Actions</th>
                        </tr>
 
                        <?php if(!empty($rows)):?>
                    
                        <?php foreach($rows as $row):?>
                            
                        <tr>
                            <td><?=esc($row->eid)?></td>
                            <td><?=esc($row->title)?></td>
                            <td><?=esc($row->type)?></td>
                            <td>    
                                <select  id ="status" name = "status" data-eid="<?=esc($row->eid)?>"  onchange= "changeStatus(<?=esc($row->eid)?>,this.value,'<?=strtolower(Auth::getRole())?>');" class="enq_cat enqStatus">
                                <option value = "">Select a status</option>
                                <option value = "escalated" <?php if($row->status== 'escalated'){echo "selected";}?>>Escalated</option>
                                <option value = "resolved" <?php if($row->status== 'resolved'){echo "selected";}?>>Resolved</option>

                                </select></br>
                            </td>
                                
                   
                            <td><?=esc($row->date)?></td>
                            <td><?=esc($row->role)?></td>
                            <td>
                            
                            <div class="enq_actions">
                            <div class="enq_delete">
                                <a href="<?=ROOT?>/receptionist/enquiry/delete/<?=esc($row->eid)?>">
                                <button class="delete_enq_btn">Delete</button>
                                </a>
                                </div>
                                <div class="enq_view">
                                    <a href="<?=ROOT?>/manager/enquiry/view/<?=esc($row->eid)?>">
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
    <div  id="overlay"></div>
    <script defer src="<?=ROOT?>/assets/js/enquiry.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>

