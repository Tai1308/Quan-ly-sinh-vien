<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\diemdanh;
use DB;
class ajaxController extends Controller
{
    public function getBuoihoc(Request $request)
    {
    	$id = $request->id;
    	$data = DB::table('register_course_student')
                    ->join('period', 'period.courseId', '=', 'register_course_student.courseId')
                    ->join('student', 'student.student_id', '=', 'register_course_student.studentId')
                    ->select('student.*','period.id as id_period','register_course_student.id as id_registerStudent')
                    ->where('period.id', $id)
                    ->get();   
        foreach ($data as $dt) 
        {
        	$student = DB::table('diemdanh')
                    ->select('diemdanh.*')
                    ->where('diemdanh.id_period', $id)
                    ->where('diemdanh.id_registerStudent', $dt->id_registerStudent)
                    ->first() ?? new diemdanh; 
       
            $thamgia = $student->thamgia?'checked':'';
            $vang    = $student->vang?'checked':'';
            $lydovang1 = $student->lydovang == 1?"selected":"";
            $lydovang2 = $student->lydovang == 2?"selected":"";
            $lydovang3 = $student->lydovang == 3?"selected":"";
            $lydovang4 = $student->lydovang == 4?"selected":"";
	       echo "
	            <tr data-expanded='true'>
	                <td class='t_table'> {$dt->student_name}</td>
	                <td class='t_table'>
	                    <label>
	                    	<input data-id='thamgia-{$dt->student_id}' data-st='{$dt->student_id}' name='thamgia_buoihoc' {$thamgia} id='thamgia_buoihoc'  data-register='{$dt->id_registerStudent}' data-period='{$dt->id_period}' type='checkbox' value='' >
	                    </label>
	                </td>
	                <td class='t_table'>
	                    <label>
	                    	<input data-id='vanghoc-{$dt->student_id}' data-st='{$dt->student_id}' name='vang_buoihoc' id='vang_buoihoc' {$vang} type='checkbox'  value='' data-register='{$dt->id_registerStudent}' data-period='{$dt->id_period}' >
	                    </label>
	                </td>
	                <td class='t_table'>
	                    <select data-id='vanghoc-{$dt->student_id}' name='lydovang_buoihoc' id='lydovang_buoihoc' class='form-control' data-register='{$dt->id_registerStudent}' data-period='{$dt->id_period}' >
	                        <option value='0'>Lý do</option>
	                        <option {$lydovang1} value='1'>Bệnh</option>
	                        <option {$lydovang2} value='2'>Công tác</option>
	                        <option {$lydovang3} value='3'>Thi</option>
	                        <option {$lydovang4} value='4'>Khác</option>
	                    </select>
	                </td>
	                <td></td>
	            </tr>
	    	";
	    	
        }  
        echo "<input type='hidden' value='1' name='check_display' id='check_display'>";
    }
    public function saveDiemdanh(Request $request)
    {
    	$student = DB::table('diemdanh')
                    ->select('diemdanh.*')
                    ->where('diemdanh.id_period', $request->period)
                    ->where('diemdanh.id_registerStudent', $request->register)
                    ->first(); 
        if(!empty($student))
        {
        	 diemdanh::where([
        									'id_period' => $request->period,
        								 	'id_registerStudent' =>  $request->register
        								])
					            ->update([
					                		$request->column => $request->value,
					            		]);
        }else
        {
        	DB::table('diemdanh')->insert([   
        											'id_period' 			=> $request->period,
        											'id_registerStudent' 	=>  $request->register,
        											 $request->column 		=> $request->value
                               					]);
        }
    }
}
