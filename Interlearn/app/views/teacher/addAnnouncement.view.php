<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="recp_ann_container">
<?php $this->view("includes/sidebar_recep");?>
    <div class="recp_ann_content">
        <h3>Add Announcements</h3><br><br>
        <form method="POST" action="">
            <label for="">Announcement name: </label><br>
            <input type="text" class="recp_ann_name" name="title"><br><br>
            <label for="">Content: </label><br>
            <!-- <input type="text" class="recp_ann_cont" name="content"> -->
            <textarea name="content" id="" cols="148" rows="10"></textarea><br><br>
            <label for="">Attach Files: </label><br><br>
            <input type="file" class="recp_ann_name" name="attachment"><br>

            
            
            
            <button type="submit" class="recp_det_btn">Save</button>

            
        </form>
        
    </div>
</div>

<?php $this->view("includes/footer");?>