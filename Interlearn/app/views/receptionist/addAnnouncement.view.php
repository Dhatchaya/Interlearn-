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

            <label for="class">Class: </label><br>
            <select name="course_id" id="class" class="recp_ann_clz">
                <option value="slect" selected>--Select the class--</option>
                <?php if(!empty($courses)):?>
                <?php foreach($courses as $course):?>
                <option value="<?=esc($course->course_id)?>">Grade <?=esc($course->grade)?> - <?=esc($course->subject)?> (<?=esc($course->language_medium)?>)</option>
                <?php endforeach;?>
                <?php endif?>
            </select>
            
            <br><br>
            <label for="tchr">Teacher Name:</label><br>
            <select name="teacher_id" id="tchr" class="recp_ann_clz">
                <option value="tchrslct" selected>--Select the teacher--</option>
                <?php if(!empty($courses)):?>
                <?php foreach($courses as $course):?>
                <option value="<?=esc($course->teacher_id)?>"><?=esc($course->teacher_id)?> - <?=esc($course->fullname)?></option>
                <?php endforeach;?>
                <?php endif?>
            </select>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                // Event listener for when the class select dropdown changes
                $(document).on('change', '#class', function(){
                  // Get the selected class ID
                  var class_id = $(this).val();
                
                  // Make an AJAX request to get the list of teachers for the selected class
                  $.ajax({
                    url: 'get_teachers.php',
                    type: 'POST',
                    data: { class_id: class_id },
                    success: function(response) {
                      // Update the teacher select dropdown with the list of teachers
                      $('#teacher_select').html(response);
                    }
                  });
                });
            </script>
            
            <button type="submit" class="recp_det_btn">Save</button>

            
        </form>
        
    </div>
</div>

<?php $this->view("includes/footer");?>