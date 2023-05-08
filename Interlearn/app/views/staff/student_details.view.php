<?php $this->view("includes/header");?>


<div class="main-body-div">
    <?php $this->view("includes/sidebar_man");?>
    <div class="top-to-bottom-content">
       
        <?php $this->view("includes/nav");?>
   
        <div class="clm2 marginlow">

          

            <div id="enq_tab_content" class= "enq_tab_content">

            

                <div id="reg_all_content" class= "content-tab"  >
                    <table border= 1 class='enq_tbl'>
                        <tr>
                            <th>Student</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                           
                           
                            <th class="enq_action_clm2">Actions</th>
                        </tr>

                        <?php if(!empty($rows)):?>
                        
                        <?php foreach($rows as $row):?>
                        <tr>
                            
                            <td><img src="<?=ROOT?>/uploads/images/<?=esc($row->display_picture)?>" alt="picture" class="display_picture_img"/></td> 
                            <td><?=esc($row->first_name)?></td>
                            <td><?=esc($row->last_name)?></td>
                   
                            <td>
                        
                            <div class="enq_actions">
                     
                            <div class="enq_view">
                                <?php if($user == "student"):?>
                               
                                <a href="<?=ROOT?>/<?=Auth::getrole();?>/allprofiles/student/<?=esc($row->uid)?>">
                                <button class="view_enq_btn">View</button>
                                </a>
                                <?php elseif ($user == "staff"):?>
                               
                                    <a href="<?=ROOT?>/<?=Auth::getrole();?>/allprofiles/staff/<?=esc($row->uid)?>">
                                    <button class="view_enq_btn">View</button>
                                </a>
                                <?php endif;?>
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
        
    </div>     
</div>  
  
    <script defer src="<?=ROOT?>/assets/js/Registrations.js?v=<?php echo time(); ?>"></script>
       <script defer src="<?=ROOT?>/assets/js/addregistration.js?v=<?php echo time(); ?>">

</script>
<?php $this->view("includes/footer");?>

