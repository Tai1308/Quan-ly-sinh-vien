<?php

namespace App\Http\Controllers\Backend;
use App\course;
use App\student;
use App\test;
use App\list_time;
use DB,DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\CourseIntensiveRequest;


class courseController extends Controller
{
    public function getCourseIntensive(Request $request)
    {
       
    	$course = new Course();
        $list_time = new list_time();
        $studyTime = $list_time->getListStudyTime();
        $studyShift = $list_time->getListStudyShift();
    	$courses = $course->getCourseByidCategory( $request->id );

    	return view('admin.more2level.course_intensive',[  
                                                            'courses'        => $courses, 
                                                            'category_id'   =>  $request->id,
                                                            'studyTime'     => $studyTime,
                                                            'studyShift'    => $studyShift
                                                        ]);
    }
    public function editCourseIntensive()
    {
    	return view('admin.more2level.course_intensive');
    }

    public function addCourseIntensive(CourseIntensiveRequest $request)
    {
        $now        = strtotime(date('Y-m-d'));
        $date_now   = strtotime($now['year'] . '-' . $now['mon'] . '-' . $now['mday']);
        $startDate  = strtotime($request->startDate);
        $endDate    = strtotime($request->endDate);
        $date_valid = strtotime("$request->startDate +1 months");

        if ($startDate < $now || $startDate < $date_now || $endDate < $date_valid) {
            return redirect()->back()->withInput()->with('loi', 'Ngày bắt đầu phải lớn hơn bằng ngày hiện tại và sau ngày kết thúc và ngày kết thúc phải lớn hơn ngày bắt đầu ít nhất 1 tháng');
        }
        else
        {
            
            $tuition = intval(str_replace(',', '', $request->tuition));
            $quantity = $request->quantity;

            if ($quantity < 0) {
                throw ValidationException::withMessages(['quantity' => 'Số lượng học viên không được phép nhỏ hơn 0.']);
            }

            if ($tuition < 0) {
                throw ValidationException::withMessages(['tuition' => 'Học phí không được phép nhỏ hơn 0.']);
            }

            $course                 = new course;
            $course->name           = $request->name;
            $course->startDate      = $request->startDate;
            $course->endDate        = $request->endDate;
            $course->category_id    = $request->category_id;
            $course->id_studyTime   = $request->studyTime;
            $course->id_studyShift  = $request->studyShift;
            $course->tuition  = $tuition;
            $course->quantity  = $request->quantity;
            $course->notes  = $request->notes;

            $course->save();
            return redirect("admin/more2level/courseIntensive/{$course->category_id}")->with('thongbao','Thêm thành công'); 
        }
        
    }


    public function deleteCourseIntensive(Request $request)
    {
    	course::where(['id' => $request->id])->delete();
        return redirect("admin/more2level/courseIntensive/{$request->category_id}")->with('thongbao','Xóa khóa học thành công');
    }

    public function registerTeacher(Request $request)
    {
        $course = new Course();
        $checkCourse = Course::find($request->courseId);
    
        $teacherRegisters = DB::table('register_course_teacher')->where('teacherId', $request->teacherId)->pluck('courseId')->toArray();
        
        $courses = Course::where(['id_studyTime' => $checkCourse->id_studyTime, 'id_studyShift' => $checkCourse->id_studyShift])
            ->whereIn('id', $teacherRegisters)->count();
            
        if ($courses > 0) {
            return redirect()->back()->with('loi', 'Không thể đăng ký giáo viên đã trùng thời gian giảng dạy');
        }
        $courses = $course->insertTeacher($request->teacherId, $request->courseId);

        return redirect("admin/more2level/infoCourse/{$request->courseId}")->with('thongbao', 'Thêm giáo viên thành công');
    }

    public function deleteTeacher(Request $request)
    {
        $course = new Course();

        $courses = $course->deleteTeacher($request->id );

    	return redirect("admin/more2level/infoCourse/{$request->courseId }")->with('thongbao','Xóa giáo viên thành công');
    }

    public function listStudent(Request $request)
    {
       $course = new Course();
       $students   = $course->getStudentOfCourse($request->id);
       $exstudents  =  $course->getListStudent(); 
       return view('admin.more2level.student_intensive',[  'exstudents' => $exstudents ,'students' => $students,
                                                            'courseId' => $request->id,
                                                                 ]);
    }
   // thêm  học vien đã ghi danh trong lớp học 
    public function registerStudent(Request $request)
    {
        $data_trung = '';

        if (!$request->student_attend) {
            return redirect("admin/more2level/addNewStudents/{$request->courseId}")->with('loi', 'Cần tích chọn học viên khi thêm vào lớp');
        }

        $course_detail = Course::find($request->courseId);
        if (!$course_detail) {
            return redirect("admin/more2level/infoCourse/{$request->courseId }")->with('loi','Không tồn tại khóa học');
        }

        $numberStudent = DB::table('register_course_student')->where('courseId', $course_detail->id)->count();

        if ($numberStudent >= $course_detail->quantity || count($request->student_attend) > $course_detail->quantity) {
            return redirect("admin/more2level/infoCourse/{$request->courseId }")->with('loi','Số lượng học viên đã đầy hoặc thêm quá số lượng học viên vào lớp học');
        }

        if(empty($request->student_attend))
        {
            return redirect("admin/more2level/infoCourse/{$request->courseId }")->with('loi','Không có học viên nào được chọn ghi danh vào lớp học');
        }
        else
        {
            foreach ($request->student_attend as $sa) 
            {
                $course = new Course();
                $id_registerSudent = $course->checkIdStudent($sa, $request->courseId);

                if($id_registerSudent > 0)
                {
                    $data_trung .= $sa.' ';
                }
                else
                {
                    $course_detail = \DB::table('course_detail')->where('id', $request->courseId)->first();

                    $tuition = 0;
                    if ($course_detail) {
                        $tuition = $course_detail->tuition;
                    }
                    $courses = $course->insertStudent($sa, $request->courseId, $tuition);
                    $course->insertStudentHistory($sa, $request->courseId);
                    $data_students = $course->getDataStudent($sa,$request->courseId);

                    foreach ($data_students as $data_student => $student) 
                    {
                        $data = ['name_student' => $student->student_name, 'email' => $student->email, 'name_course' => $student->name_course, 'startDate' => $student->startDate, 'endDate' => $student->endDate];
                    }
                    
                }
            }
            if($data_trung != '')
            {
                return redirect("admin/more2level/infoCourse/{$request->courseId }")->with('loi', 'Học viên '.$data_trung.' đã được ghi danh');
            }
            return redirect("admin/more2level/infoCourse/{$request->courseId }")->with('thongbao', 'Ghi danh học viên thành công');
        }
    }

    // xóa học vien đã ghi danh trong lớp học 
    public function deleteStudent(Request $request)
    {
    	$course = new Course();
        $courses = $course->deleteStudent($request->id );
        return redirect("admin/more2level/infoCourse/{$request->courseId }")->with('thongbao','Xóa học viên thành công');
    }

    //Giao diện thêm mới học viên
    public function getPageInfoCourse(Request $request)
    {
        
        $course         = new Course();
        $courses        = $course->getCourseByid($request->id);
        
        $students       = $course->getStudentOfCourse($request->id);
        
        $exstudents     = $course->getListStudent();
        $exteacher      = $course->getListTeacher();
        
        $count_student  =  DB::table('register_course_student')
                                    ->where('courseId',  $request->id)
                                    ->count();        
        $teachers               = $course->getTeacherOfCourse($request->id);
        $data_idStudyTime       = $course->getIdStudyTime($request->id);
        $data_idStudyShift      = $course->getIdStudyShift($request->id);
        $idStudyTime            = $data_idStudyTime[0]->id_studyTime;
        $idStudyShift           = $data_idStudyShift[0]->id_studyShift;
        $data_teachingSchedule  = $course->getDataTeaching();
        $data_document          = $course->getDataDocument($request->id);
        $student_exam           = $course->getDataExam($request->id);
        $check_exam             = $course->checkExam($request->id);
        $history_score          = $course->getHistoryScore($request->id);
        $history_exam           = $course->getHistoryExam($request->id);
        $check_teacher          = $course->getCheckTeacher($request->id);
        
        $a = array();
        foreach ($data_teachingSchedule as $keyschedule => $valueschedule) {
            if(($idStudyTime == $valueschedule->id_studyTime) && ($idStudyShift == $valueschedule->id_studyShift))
            {
            
                    $a[] = (object) array(
                        'teacher_name' => $valueschedule->teacher_name,
                        'teacher_id' => $valueschedule->teacher_id
                    );
                
            }
        }
       
        $exteachers = array();
        $exteachers = !empty($a) ? $a : $exteacher;
       
        $periods    = DB::table('period')
                        ->join('studyshift', 'studyshift.id', '=', 'period.id_studyShift')
                        ->join('teacher', 'teacher.teacher_id', '=', 'period.teacherId')
                        ->select('period.*','teacher.teacher_name as teacher_name','studyshift.name_studyShift as name_studyShift','studyshift.start_time as start_time', 'studyshift.end_time as end_time')
                        ->where('period.courseId', '=', $request->id)
                        ->get();
        
        $data_study = DB::table('course_detail')
                        ->join('studyshift', 'studyshift.id', '=', 'course_detail.id_studyShift')
                        ->join('studytime', 'studytime.id', '=', 'course_detail.id_studyTime')
                        ->select('studyshift.name_studyShift as name_studyShift', 'studytime.name_studyTime as name_studyTime', 'studyshift.start_time as start_time', 'studyshift.end_time as end_time', 'studyshift.id as id_studyShift', 'studytime.id as id_studyTime')
                        ->where('course_detail.id', '=', $request->id)
                        ->get();
        return view('admin.more2level.infoCourse',  [   'courses'       => $courses,
                                                        'category_id'   => $request->id,
                                                        'data_document' => $data_document,
                                                        'exstudents'    => $exstudents ,
                                                        'students'      => $students,
                                                        'courseId'      => $request->id,
                                                        'exteachers'    => $exteachers ,
                                                        'teachers'      => $teachers,
                                                        'periods'       => $periods,
                                                    
                                                        'count_student' => $count_student,
                                                    
                                                        'data_study'    => $data_study,
                                                        'student_exam'  => $student_exam,
                                                        'check_exam'    => $check_exam,
                                                        'history_score' => $history_score,
                                                        'history_exam'  => $history_exam,
                                                        'check_teacher' => $check_teacher
                                                    ]);
    }


    public function getPageAddstudent(Request $request)
    {
        $course = new Course();
        $courses = $course->getCourseByid( $request->id );
        $exstudents  =  $course->getListStudent();
        return view('admin.more2level.newStudents', [   'courses' => $courses,
                                                        'courseId' => $request->id,
                                                        'exstudents' => $exstudents
                                                    ]);
    }

    public function addPeriodofCourse(Request $request)
    {

        $periodOfCourse = new Course();
        $now        = getdate();
        $date_now   = strtotime($now['year'].'-'.$now['mon'].'-'.$now['mday']);
        $date_study  = strtotime($request->date_study);
        $startDate = strtotime($request->startDate);
        $endDate = strtotime($request->endDate);

        $data_period = DB::table('period')
            ->select('period.period', 'period.courseId', 'period.date_study', 'period.teacherId', 'period.id_studyShift')
                        ->where('period.courseId', '=', $request->courseId)
                        ->get();

        $checkTeacher = DB::table('period')
            ->where(['date_study' => $request->date_study, 'teacherId' =>$request->teacherId, 'id_studyShift' => $request->id_studyShift])->get()
            ->toArray();

        foreach ($data_period as $keyd => $valued) 
        {
            $data_time = strtotime($valued->date_study);

            if($request->period == $valued->period && $request->courseId == $valued->courseId)
            {
                return redirect()->back()->withInput()->with('loi', 'Buổi học đã có');
            }
            elseif ($date_study == $data_time && $request->courseId == $valued->courseId) 
            {
                return redirect()->back()->withInput()->with('loi', 'Thời gian buổi học bị trùng với thời gian đã tạo');
            }
        }

        if (!empty($checkTeacher)) {
            return redirect()->back()->withInput()->with('loi', 'Giáo viên đã bị trùng lịch dạy');
        }

        if($date_study < $date_now)
        {
            return redirect()->back()->withInput()->with('loi', 'Ngày học phải sau ngày hiện tại');
        }
        elseif ($date_study < $startDate) 
        {
            return redirect()->back()->withInput()->with('loi', 'Ngày học phải sau ngày bắt đầu khóa học');
        }
        elseif ($date_study > $endDate) 
        {
            return redirect()->back()->withInput()->with('loi', 'Ngày học không được sau ngày kết thúc khóa học');
        }
        else
        {
            $this->validate($request,
            [
                'period' => 'required',
                'date_study' => 'required'
            ],
            [
                'period.required' => 'Buổi học không được để trống',
                'date_study.required' => 'Ngày học không được để trống',
            
            ]);

            $periodOfCourses = $periodOfCourse->insertPeriod($request->period,  $request->courseId, $request->teacherId, $request->skill, $request->date_study, $request->id_studyShift);
            return redirect("admin/more2level/infoCourse/{$request->courseId}")->with('thongbao', 'Thêm buổi học thành công');
        }
    }
    
    public function deletePeriodofCourse(Request $request)
    {
        DB::table('period')
            ->where('id', '=', $request->id)
            ->delete();
        return redirect("admin/more2level/infoCourse/{$request->courseId}")->with('thongbao', 'Xóa buổi học thành công'); 
    }
    
    public function getInfoExam(Request $request)
    {
        $test = new test();
        $data_question = $test->getListQuestion($request->id);
        $courseId = $request->id;
        return view('admin.more2level.infoExam',[
                                                    'data_question' => $data_question,
                                                    'courseId'      => $courseId
                                                ]);
    }

    public function getInfoQuestionExam(Request $request)
    {
        $test = new test();
        $data_question  = $test->getQuestionOfCourse($request->id);
        $data_answer    = $test->getAnswerOfCourse($request->id);
        return view('admin.more2level.infoQuestionExam',    [
                                                                'data_question'     => $data_question,
                                                                'data_answer'       => $data_answer
                                                            ]);
    }

    public function postAddDocument(Request $request)
    {
        $course = new Course();
        $date_post = date("Y-m-d");
        $this->validate($request,
            [
                'document_name'         => 'required|min:3|max:200',
                'detail_doc'            => 'required',
            ],
            [
                'document_name.required'    => 'Tài liệu không được để trống',
                'document_name.min'         => 'Tên tài liệu phải chứa ít nhất 3 ký tự',
                'document_name.max'         => 'Tên tài liệu không hợp lệ',
                'detail_doc.required'       => 'Mô tả không được để trống',
            ]);
        if($request->hasFile('file'))
        {   
            $file= $request->file('file');
            $name = $file->getClientOriginalName();
            $file_doc = str_random(4)."_".$name;
            while (file_exists("uploads/document/".$file)) 
            {
                $file_doc = str_random(4)."_".$name;
            }
            $file->move("uploads/document", $file_doc);
            $document = $file_doc;
        }
        else
        {
            $document = "";
        }
        $documents = $course->insertDocument($request->document_name, $request->detail_doc, $request->courseId, $date_post, $document);
        return redirect("admin/more2level/infoCourse/{$request->courseId}")->with('thongbao','Thêm tài liệu luyện tập thành công');
    }

    public function postUpdateDocument (Request $request)
    { 
        $this->validate($request,
            [
                'name_doc'      => 'required|min:3|max:200',
                'detail_doc'    =>'required'
            ],
            [
                'name_doc.required'     => 'Tên tài liệu không được để trống',
                'name_doc.min'          => 'Tên tài liệu phải chứa ít nhất 3 ký tự',
                'name_doc.max'          => 'Tên tài liệu không hợp lệ',
                'detail_doc.required'   => 'Mô tả không được để trống'
            ]);
        $data_doc = [ 
                        'name'      => $request->name_doc,
                        'detail'    => $request->detail_doc
                    ];
        DB::table('document_course')
                ->where('id', '=', $request->document_id)
                ->update($data_doc);
        return redirect("admin/more2level/infoCourse/{$request->courseId}")->with('thongbao','Sửa tài liệu luyện tập thành công');
    }
    public function postDeleteDocument(Request $request)
    {
        $course = new Course();

        $data_document = $course->deleteDocument($request->document_id);

        return redirect("admin/more2level/infoCourse/{$request->courseId}")->with('thongbao','Xóa tài liệu luyện tập thành công');
    }
     public function updateStatusTuition(Request $request, $id)
     {
        if ($request->ajax()) {
            $student = DB::table('register_course_student')->where('id', $id)->first();

            if (isset($student) && $student->status == 1) {
                $status = 2;
                $textStatus = 'Chưa nộp';
            } else {
                $status = 1;
                $textStatus = 'Đã nộp';
            }

            $student = DB::table('register_course_student')->where('id', $id)->update(['status' => $status]);

            if ($student) {
                return response([
                    'code' => 200,
                    'text_status' => $textStatus,
                    'status' => $status,
                    'student_id' => $id
                ]);
            }
        }
    }

    public function postAddScore(Request $request)
    {
        $course = new Course();
        $this->validate(
            $request,
            [
                'student_test'     => 'numeric',
                'writing_score'     => 'numeric',
                'reading_score'     => 'numeric',
                'listening_score'   => 'numeric',
                'speaking_score'    => 'numeric'
            ],
            [
                'student_test.numeric'     => 'Điểm kỹ năng viết nhập phải là kiểu số',
                'writing_score.numeric'     => 'Điểm kỹ năng viết nhập phải là kiểu số',
                'reading_score.numeric'     => 'Điểm kỹ năng viết nhập phải là kiểu số',
                'listening_score.numeric'   => 'Điểm kỹ năng viết nhập phải là kiểu số',
                'speaking_score.numeric'    => 'Điểm kỹ năng viết nhập phải là kiểu số'
            ]
        );
        if ($request->student_test < 0 || $request->writing_score < 0 || $request->reading_score < 0 || $request->speaking_score < 0 || $request->listening_score < 0) {
            return redirect("admin/more2level/infoCourse/{$request->courseId}")->with('loi', 'Điểm thi phải lớn hơn 0');
        } elseif ($request->writing_score > 9 || $request->reading_score > 9 || $request->speaking_score > 9 || $request->listening_score > 9) {
            return redirect("admin/more2level/infoCourse/{$request->courseId}")->with('loi', 'Điểm thi phải nhỏ hơn 9');
        } else {

            if ($request->student_test == null) {
                $student_test = 0;
            } else {
                $student_test = $request->student_test;
            }

            if ($request->writing_score == null) {
                $writing_score = 0;
            } else {
                $writing_score = $request->writing_score;
            }
            if ($request->reading_score == null) {
                $reading_score = 0;
            } else {
                $reading_score = $request->reading_score;
            }
            if ($request->speaking_score == null) {
                $speaking_score = 0;
            } else {
                $speaking_score = $request->speaking_score;
            }
            if ($request->listening_score == null) {
                $listening_score = 0;
            } else {
                $listening_score = $request->listening_score;
            }
            $score = $course->updateScore($request->id, $writing_score, $reading_score, $speaking_score, $listening_score, $student_test);
            $overall = round((($writing_score + $reading_score + $speaking_score +  $listening_score) / 4), 1);
            $end_overall = substr($overall, 2, 2);
            $start_overall = substr($overall, 0, 1);
            if ($end_overall < 5 && $end_overall > 0) {
                $score_overall = $start_overall . "." . "5";
            } elseif ($end_overall == null) {
                $score_overall = $start_overall . "." . "0";
            } elseif ($end_overall == 5) {
                $score_overall = $start_overall . "." . "5";
            } elseif ($end_overall > 5) {
                $score_overall = ($start_overall + 1) . "." . "0";
            }

            $student = $course->getIdStudent($request->id);
            foreach ($student as $ke_student => $value_student) {
                $id_student = $value_student->id_student;
            }
            $data_target = $course->getDataTarget($id_student);
            foreach ($data_target as $key_target => $value_target) {
                $target = $value_target->target_point;
            }
            if ($score_overall < $target) {
                $result = "Chưa đạt";
            } elseif ($score_overall >= $target) {
                $result = "Đạt";
            }
            $data_result = $course->updateResult($score_overall, $result, $request->id);
            return redirect("admin/more2level/infoCourse/{$request->courseId}?active=score")->with('thongbao', 'Thực hiện lưu điểm thi thành công');
        }
    }
}
