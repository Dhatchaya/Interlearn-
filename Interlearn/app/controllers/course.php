
<?php
class Course extends Controller
{
public function index($action = null, $id = null)
    {
        $subject = new Subject();
        $course = new Course();
        $teacher = new Teacher();
        $instructor = new Instructor();
        $course_instructor = new CourseInstructor();
        $data = [];
        $data['sums']= $subject -> distinctSubject([],'subject');
        //show($data['sums']);die;

        if($action == 'view')
        {
            $data = [];
                $data['action'] = $action;
                $data['id'] = $id;
                $subject = new Subject();
                //show($data['id']);die;

                //if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    if(isset($_GET['id'])){
                        $subject_id = $_GET['id'];
                        $data['subject_id'] = $subject_id;
                        // $allSubjects = $subject -> where(['subject_id'=>$subject_id],'subject_id');
                        $subjectGrade = $subject -> getSubjectGrade($subject_id);
                        // show($subjectGrade->subject_id);die;
                        $subjectName = $subjectGrade[0]->subject;
                        $grade = $subjectGrade[0]->grade;
                        //  echo $subjectName;
                        //  echo $grade;die;
                        $data['mediums'] = $subject -> getMedium($subjectName,$grade);
                          //show($data['mediums']);die;

                        //show($data['subjectgrd']);die;
                                // show($allSubjects);die;

                    $medium = "Sinhala";

                    //  $data['subjects']=$subject->selectTeachers(['subject'=>$allSubjects[0]->subject, 'grade'=>$allSubjects[0]->grade],$medium,$subject_id);
                     $data['subjects'] = $subject -> selectTeachers(['subject_id'=>$data['mediums'][0]->subject_id],$data['mediums'][0]->language_medium);

                    $data['sinhalaid'] = $subject->getSubjectId($subjectName,$grade,"Sinhala");
                    $data['englishid'] = $subject->getSubjectId($subjectName,$grade,"English");
                    $data['tamilid'] = $subject->getSubjectId($subjectName,$grade,"Tamil");
                    // show($data['subjects']);die;

                    $data['teach_instructors'] = [];
                    $extra = [];
                    for($i=0; $i<count($data['subjects']); $i++){

                        $extra= $course_instructor -> getInstructors($data['subjects'][$i]->course_id);
                        if(!empty($extra)){
                            $data['teach_instructors'] = $extra;
                        }



                    }
                    // show($data['teach_instructors']);
                    // //
                    // die;
                    // }
                }
                $data['teachers'] = $teacher->select([],'teacher_id','asc');
                $data['instructors'] = $instructor->select([],'instructor_id','asc');

            $this->view('details',$data);
            exit;

        }

        $data['rows']= $course->select([],'course_id');
        $data['sums']= $subject -> distinctSubject([],'subject');
        //show($data['sums']);die;
       $this->view('courses',$data);
    }

}