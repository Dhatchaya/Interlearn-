<?php $this->view("includes/header");?>
<?php $this->view("includes/nav"); 
$url = $_GET['url'];
$url = rtrim($url,'/');
$val = explode('/',$url);
?>

<div class="recp_cl_container">
<?php $this->view("includes/sidebar_recep");?>
    <div class="recp-enroll-content">
    <!-- <div class="recp_cl_staff"> -->
            <table class="std-enroll-table">
            
                <th>Request ID</th>
                <th>Student ID</th>
                <th>Requested Date</th>
                <th>Subject</th>
                <th>Teacher </th>
                <th>Actions  </th>
                
                <tr>
                <?php if(!empty($requests)):?>

                    <?php foreach($requests as $request):?>
                        <td><?=esc($request->request_id)?></td>

                        <td><?=esc($request->student_id)?></td>

                        <td><?=esc($request->requested_date)?></td>

                        <td><?=esc($request->subject)?></td>

                        <td><?=esc($request->teacherName)?></td>

                        <td>
                        <button class="view_enq_btn" name="submit" id="button28" onclick="getRequests(<?=esc($request->request_id)?>)">View</button>

                        <form action="" method="post">

                            <input type="hidden" id="requestID" name="requestID" value="<?=$request->request_id?>">
                            <input type="hidden" id="studentId" name="studentId" value="<?=$request->student_id?>">
                            <input type="hidden" id="courseId" name="courseId" value="<?=$request->course_id?>">

                            <button type="submit" class="view_enq_btn" name="accept-student" id="add-btn">Accept</button>
                        </form>

                        <button class="view_enq_btn" id="button29" onclick="openModal2(<?=$request->request_id?>)">Reject</button>
                        </td>

                    </tr>
                    <?php endforeach;?>

                <?php else:?>
                   <?php echo "No requests yet!"; ?>
                <?php endif;?>
            </table>

            <!-- view popup -->
        <div id="profileModal" class="popupModal">
            <div class="popupmodal-content">

                <span class="ann_close" onclick="closeModal()">&times;</span><br>

                <h3>--Student Enrollment Request Details--</h3><br>

                <form action="" method="post" class="up-profile">

                    <input type="hidden" id="request_modal" name="request_id">



                    <label for="student_id" class="enroll-display">Student ID: </label>
                    <input type="text" id="student_id" value="" disabled>

                    <label for="course_id" class="enroll-display">Requested Course ID: </label>
                    <input type="text" id="course_id" value="" disabled>

                    <label for="studentName" class="enroll-display">Student Name: </label>
                    <input type="text" id="studentName" value="" disabled>

                    <label for="requested_date" class="enroll-display">Requested Date: </label>
                    <input type="text" id="requested_date" value="" disabled>

                    <label for="subject" class="enroll-display">Subject: </label>
                    <input type="text" id="subject" value="" disabled>

                    <label for="grade" class="enroll-display">Grade: </label>
                    <input type="text" id="grades" value="" disabled>

                    <label for="teacherName" class="enroll-display">Teacher Name: </label>
                    <input type="text" id="teacherName" value="" disabled>

                    <label for="day" class="enroll-display">Class Day: </label>
                    <input type="text" id="day" value="" disabled>

                    <label for="time" class="enroll-display">Time Slot: </label>
                    <input type="text" id="time" value="" disabled>

                    <label for="available" class="enroll-display">Availability: </label>
                    <input type="text" id="available" value="" disabled>



                </form>
            </div>
        </div>


        <!-- reject student popup -->
        <div id="profileModal2" class="popupModal">
            <div class="popupmodal-content">
                <span class="ann_close" onclick="closeModal2()">&times;</span><br>
                <h3>--Reject Student Enrollment Request--</h3><br>
                <form action="" method="post" class="up-profile">
                    <p>Are you sure you want to reject this request?</p><br>
                    <input type="hidden" id="requestID" name="requestID" value="<?=$request->request_id?>">
                    <button type="submit" class="teacher_upl_btn" name="submit-reject-request" id="reject-btn">Yes</button>
                    <button type="reset" class="teacher_upl_btn" id="cancel-btn" onclick="closeModal2()">Cancel</button>
                </form>
            </div>
        </div>


    </div>
</div>


<script defer src="<?=ROOT?>/assets/js/enroll.js?v=<?php echo time(); ?>"></script>
<script defer src="<?=ROOT?>/assets/js/enroll_view.js?v=<?php echo time(); ?>"></script>


<?php $this->view("includes/footer");?>