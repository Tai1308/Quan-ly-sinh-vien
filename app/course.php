<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
class course extends Model
{
    //
    protected $table = "course_detail";
    public $timestamps = false; 

    public function getCourseByidCategory($id = 1)
    {
    	return $this->where('category_id','=',$id)->paginate(10);
    }

    public function getCourseByid($id = 1)
    {
        return $this->where('id','=',$id)->paginate(10);
    }

    public function getTeacherOfCourse($id)
    {
    	$sql = "SELECT t.*,  ct.id,  c.name as coursename FROM register_course_teacher ct 
    			LEFT JOIN teacher t ON t.teacher_id = ct.teacherId
    			LEFT JOIN course_detail c ON c.id = ct.courseId
    			where ct.courseId = ?";
    	 return DB::select($sql, array($id));
    }

    public function getListTeacher()
    {
        return  DB::table('teacher')
                ->orderBy('teacher_id','desc')->get();
    }

    public function insertTeacher($teacherId, $courseId)
    {
        return  DB::table('register_course_teacher')
                    ->insert(['teacherId' => $teacherId, 'courseId' => $courseId]);
    }

    public function deleteTeacher($id)
    {
        return DB::table('register_course_teacher')
                        ->where('id',$id)
                        ->delete();
    }

    public function getStudentOfCourse($id)
    {
        $sql = "SELECT s.*,  cs.id,  c.name as coursename, cs.status, cs.tuition FROM register_course_student cs 
                LEFT JOIN student s ON s.student_id = cs.studentId
                LEFT JOIN course_detail c ON c.id = cs.courseId
                where cs.courseId = ?";
         return DB::select($sql, array($id));
    }

    public function getListStudent()
    {
        return  DB::table('student')->orderBy('student_id','desc')->get();
    }

    public function insertStudent($studentId, $courseId, $tuition)
    {
        return  DB::table('register_course_student')->insert(['studentId' => $studentId, 'courseId' => $courseId, 'tuition' => $tuition]);
    }

    public function insertStudentHistory($studentId, $courseId) {
        return  DB::table('history')->insert(['id_student' => $studentId, 'courseId' => $courseId]);
    }

    public function checkIdStudent($studentId, $courseId)
    {
        return  DB::table('register_course_student')
                ->where('register_course_student.studentId', '=', $studentId)
                ->where('register_course_student.courseId', '=', $courseId)
                ->count();
    }

    public function deleteStudent($id)
    {
        return DB::table('register_course_student')
                        ->where('id',$id)
                        ->delete();
    }
    //Lịch học
    public function insertPeriod($period, $courseId, $teacherId, $skill, $date_study, $id_studyShift)
    {
        return  DB::table('period')->insert([   'period'        => $period,
                                                'courseId'      => $courseId,
                                                'teacherId'     => $teacherId, 
                                                'skill'         => $skill,
                                                'date_study'    => $date_study,
                                                'id_studyShift' => $id_studyShift
                                            ]);
    }

    public function getPeriodOfCourse($id)
    {
        $sql = "SELECT p.*, c.id, p.id as period_id, t.teacher_name as teacher_name FROM period p 
                LEFT JOIN teacher t ON t.teacher_id = p.teacherId
                LEFT JOIN course_detail c ON c.id = p.courseId
                where p.courseId = ?";
         return DB::select($sql, array($id));
    }

     public function getIdStudyTime($id)
    {
        return DB::table('course_detail')
                ->select('course_detail.id_studyTime')
                ->where('course_detail.id', '=', $id)
                ->get();
    }

    public function getIdStudyShift($id)
    {
        return DB::table('course_detail')
                ->select('course_detail.id_studyShift')
                ->where('course_detail.id', '=', $id)
                ->get();
    }

    public function getDataTeaching()
    {
        return DB::table('teacher')
                ->join('teaching_schedule', 'teaching_schedule.id_teacher', '=', 'teacher.teacher_id')
                ->select('teaching_schedule.*', 'teacher.teacher_name as teacher_name', 'teacher.teacher_id as teacher_id')
                ->get();
    }

    public function getDataStudent($id_student, $courseId)
    {
        return DB::table('register_course_student')
                ->join('course_detail', 'course_detail.id', '=', 'register_course_student.courseId')
                ->join('student', 'student.student_id', '=', 'register_course_student.studentId')
                ->select('student.*', 'course_detail.name as name_course', 'course_detail.startDate as startDate', 'course_detail.endDate as endDate')
                ->where('register_course_student.studentId', '=', $id_student)
                ->where('register_course_student.courseId', '=', $courseId)
                ->get();
    }

    public function insertDocument($name, $detail, $courseId, $date_post, $file)
    {
        return  DB::table('document_course')->insert([  'name'        => $name,
                                                        'detail'      => $detail,
                                                        'courseId'    => $courseId, 
                                                        'date_post'   => $date_post,
                                                        'file'        => $file
                                                    ]);
    }

    public function getDataDocument($courseId)
    {
        return DB::table('document_course')
                ->select('document_course.*')
                ->where('document_course.courseId', '=', $courseId)
                ->get();
    }

    public function deleteDocument($document_id)
    {
        return DB::table('document_course')
                        ->where('id',$document_id)
                        ->delete();
    }

    public function getDataExam($id)
    {
        return DB::table('history')
                        ->join('exam', 'exam.id', '=', 'history.id_exam')
                        ->join('student', 'student.student_id', '=', 'history.id_student')
                        ->select('exam.name_exam', 'history.id', 'student.student_name')
                        ->where('history.courseId',$id)
                        ->get();
    }

    public function getIdCourse($id)
    {
        return DB::table('history')
                        ->select('history.courseId')
                        ->where('history.id',$id)
                        ->get();
    }

    public function updateScoreWriting($id, $score_writing, $reading_score, $listening_score, $speaking_score)
    {
        return  DB::table('history')
                    ->where('history.id',$id)
                    ->update([
                                'score_writing'     => $score_writing,
                                'reading_score'     => $reading_score,
                                'listening_score'   => $listening_score,
                                'speaking_score'    => $speaking_score,
                            ]);
                    
    }

    public function updateScore($id, $score_writing,$reading_score, $speaking_score, $listening_score, $student_test)
    {
        return  DB::table('history')
                    ->where('history.id',$id)
                    ->update([
                                'score_writing'     => $score_writing,  
                                'reading_score'     => $reading_score,
                                'speaking_score'    => $speaking_score,
                                'listening_score'   => $listening_score,
                                'score'   => $student_test,
                            ]);
                    
    }
    
    public function getTeacher($id_user)
    {
        return  DB::table('teacher')
                    ->select('teacher.teacher_id')
                    ->where('teacher.id_user',$id_user)
                    ->get();
                    
    }
    public function getRegisterCourse($id_teacher)
    {
        return  DB::table('register_course_teacher')
                    ->join('course_detail','course_detail.id','=','register_course_teacher.courseId')
                    ->select('course_detail.*')
                    ->where('register_course_teacher.teacherId',$id_teacher)
                    ->get();
                    
    }

    public function checkExam($id)
    {
        return  DB::table('exam')
                    ->where('exam.courseId',$id)
                    ->count();
                    
    }

    public function getExamWriting($id)
    {
        return  DB::table('exam')
                    ->select('exam.*')
                    ->where('exam.courseId',$id)
                    ->get();
                    
    }

    public function deleteExam($id)
    {
        return DB::table('exam')
                        ->where('id',$id)
                        ->delete();
    }

    public function deleteRegisterExam($id_exam)
    {
        return DB::table('register_question_exam')
                        ->where('id_exam',$id_exam)
                        ->delete();
    }

    public function getHistoryScore($id)
    {
        return DB::table('register_course_student')
                        ->join('student', 'student.student_id', '=', 'register_course_student.studentId')
                        ->join('history', 'history.id_student', '=', 'register_course_student.studentId')
                        ->select('history.*', 'student.student_name')
                        ->where('register_course_student.courseId',$id)
                        ->where('history.courseId', $id)
                        ->get();
    }

    public function getHistoryExam($id)
    {
        return DB::table('history')
                        ->where('history.courseId', $id)
                        ->count();
    }

    public function getCheckTeacher($id)
    {
        return DB::table('register_course_teacher')
                        ->where('register_course_teacher.courseId', $id)
                        ->count();
    }

    public function getIdStudent($idHistory)
    {
        return DB::table('history')
                ->select('history.id_student')
                ->where('history.id', '=', $idHistory)
                ->get();
    }

    public function getDataTarget($id_student)
    {
        return DB::table('student')
                ->select('student.target_point')
                ->where('student.student_id', '=', $id_student)
                ->get();
    }

    public function updateResult($score_overall, $result, $id)
    {
        return  DB::table('history')
                    ->where('history.id', $id)
                    ->update([
                                'score_overall' => $score_overall,
                                'result'        => $result
                            ]);
    }

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
}

