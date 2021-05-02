<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentCoursesController extends Controller
{
    public function index(Student $student)
    {
        $current_date = Carbon::now('America/Mazatlan')->format('Y-m-d');

        $courses = Course::join('periods', 'periods.id', '=', 'courses.period_id')
            ->select('courses.name','courses.id')
            ->whereNotIn('courses.id', function($q) use ($student){
                $q->select('course_id')
                ->from('course_student')
                ->where('student_id', $student->id);
            })
            ->whereDate('periods.start_date', '<=', $current_date)
            ->whereDate('periods.end_date', '>=', $current_date)
            ->pluck('courses.name','courses.id');

            // $appointments = Appointment::join('patients', 'patients.id', '=', 'patient_id')
            // ->select('appointments.id','patients.name', 'hour', 'date')
            // ->where('appointments.state', '=', 1)
            // ->where(function ($q) {
            //     $q->where('patients.name', 'LIKE', '%' . $this->search . '%')  
            //       ->orwhere('appointments.date', 'LIKE', '%' . $this->search . '%');
            // })->orderBy('appointments.date', 'ASC')->paginate(8);
    

        
        return view('students.addcourse', compact('student', 'courses'));
    }


    public function save(Request $request){

        //return $request->all();
        $request->validate([
            'course_id' => 'required'
        ]);
        
        $course = Course::find($request['course_id']);
        $course->students()->attach($request['student_id']);

        $student = Student::find($request['student_id']);

        return redirect()->route('student-courses', $student);
    }

    public function destroy(Student $Student){
        

    }

}
