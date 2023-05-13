<?php $this->view("includes/header");?>


<div class="main-body-div">
    <?php $this->view("includes/sidebar_recep");?>
    <div class="top-to-bottom-content">

        <?php $this->view("includes/nav");?>

        <div class="clm2 marginlow">

          
            <!-- tabs -->
            <div id="enq_tab_cont" class= "enq_tabs_container">

                <div id="reg_all" class= "enq_tab active_tab" data-status="all" onclick=setTab(this.id,this);> All Requests </div>
                <div id="reg_rejected" class= "enq_tab" data-status="rejected" onclick=setTab(this.id,this);> Rejected </div>
            </div>
             <!-- end of tabs -->
            <!-- tab content -->
            <div id="enq_tab_content" class= "enq_tab_content">

           
             
         
                <div id="reg_all_content" class= "content-tab"  >
                    <table border= 1 class='enq_tbl'>
                        <tr>
                            <th>Student ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Mobile number</th>
                            <th>Date</th>
                           
                            <th class="enq_action_clm2">Actions</th>
                        </tr>
   
                        <?php if(!empty($rows)):?>
                        
                        <?php foreach($rows as $row):?>
                        <tr>
                            <td><?=esc($row->studentID)?></td>
                            <td><?=esc($row->first_name)?></td>
                            <td><?=esc($row->last_name)?></td>
                            <td><?=esc($row->email)?></td>
                            <td><?=esc($row->mobile_number)?></td>
                            
                            <td><?=esc($row->date)?></td>
                   
                            <td>
                        
                            <div class="enq_actions">
                     
                            <div class="enq_view">
                                <a href="<?=ROOT?>/receptionist/registration/view/<?=esc($row->studentID)?>">
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
                        <!-- inside rejected -->
                <div id="reg_rejected_content" class= "content-tab hide"   > 
                    <table border= 1 class='enq_tbl'>
                            <tr>
                                <th>Student ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Mobile number</th>
                                <th>Date</th>
                             
                                <th class="enq_action_clm2">Actions</th>
                            </tr>
    
                            <?php if(!empty($rows)):?>
                            
                            <?php foreach($rows as $row):?>
                            <?php if($row->status == "rejected"):?>
                            <tr>
                                <td><?=esc($row->studentID)?></td>
                                <td><?=esc($row->first_name)?></td>
                                <td><?=esc($row->last_name)?></td>
                                <td><?=esc($row->email)?></td>
                                <td><?=esc($row->mobile_number)?></td>
                                <td><?=esc($row->date)?></td>
                              
                                <td>
                            
                                <div class="enq_actions">
                                <div class="enq_delete">
                                <!-- <a href="<?=ROOT?>/receptionist/registration/delete/<?=esc($row->studentID)?>"> -->
                                <button class="delete_enq_btn remove-btn" data-student-id="<?= $row->studentID?>">Delete</button>
                                <!-- </a> -->
                                </div>
                            <div class="enq_view">
                                <a href="<?=ROOT?>/receptionist/registration/view/<?=esc($row->studentID)?>">
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
        
    </div>
    <div class="bank-payment-form-popup remove-staff-popup">
        <div class="remove-employee-dialog-box">
            <label class="ask" for="">Are you sure to remove this Student....?</label>
            <div class="btn-container">
                <button  onclick="btnyes(this);" class="yes">Yes</button>
                <button onclick="refreshPage()" class="no">No</button>
            </div>
        </div>
        <div class="success-message">
            <label class="ask" for="refresh">Successfully removed the Student</label>
            <br>
            <div class="btn-container ">
                <button onclick="refreshPage()" class="refresh"> click to refresh</button>
            </div>
        </div>
    </div>
</div>
<script defer src="<?= ROOT ?>/assets/js/removeregisterstd.js?v=<?php echo time(); ?>"></script>
    <script defer src="<?=ROOT?>/assets/js/Registrations.js?v=<?php echo time(); ?>"></script>
       <script defer src="<?=ROOT?>/assets/js/addregistration.js?v=<?php echo time(); ?>">

</script>
<?php $this->view("includes/footer");?>

