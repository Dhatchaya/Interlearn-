<?php $this->view("includes/header"); ?>
<div class="main-body-div">
    <?php $this->view("includes/sidebar_recep"); ?>
    <div class="top-to-bottom-content">
        <?php $this->view("includes/nav"); ?>
        <div class="all-middle-content">
<div class="recp_ann_container">
    <div class="recp_ann_content">
        <h3>Add Announcements</h3><br><br>

        <?php if(!empty($errors)): ?>
            <?php foreach($errors as $error):?>
            <div id="error" class="display-error">*<?=esc($error)?></div><br>
            <?php endforeach;?>
        <?php endif;?>

        <form method="POST" action="" enctype="multipart/form-data">

            <div class="add-announcement-label">
                <label for="">Announcement name: </label><br>
                <input type="text" class="add_recp_ann_name" name="title">
            </div>
            <br><br>

            <div class="add-announcement-label">
                <label for="">Content: </label><br>
                <!-- <input type="text" class="recp_ann_cont" name="content"> -->
                <input type="text" name="content" id="content" class="add_ann_content">
            </div>
            <br><br>

            <div class="add-announcement-label">
                <label for="">Attach Files: </label><br>
                <input type="file" class="add_recp_ann_name_file" name="attachment[]" multiple>
            </div>
            <br><br>

            <div class="add-announcement-label">
                <p>Name of the file attached:</p>
                <input type="text" class="add_recp_ann_name" name="file_name">
            </div>
            <br><br><br>

            <button type="submit" class="recp_det_btn">Publish</button>

            
        </form>
        
    </div>
</div>
        </div></div></div>
<?php $this->view("includes/footer");?>