<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Teacher;
use App\Models\TeacherType;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teachers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher_type = TeacherType::pluck('name','id');
        return view('teachers.create', compact('teacher_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherRequest $request)
    {
        if ($request['gender'] == 0 ){
            $request['gender'] = "Masculino";
        }else{
            $request['gender'] = "Femenino";
        }

        $teacher = Teacher::create($request->all());
        return redirect()->route('teachers.edit', $teacher)->with('info', 'Maestro agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $teacher_type = TeacherType::pluck('name','id');
        return view('teachers.edit', compact('teacher_type', 'teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        if ($request['gender'] == 0 ){
            $request['gender'] = "Masculino";
        }else{
            $request['gender'] = "Femenino";
        }

        $teacher->update($request->all());
        return redirect()->route('teachers.edit', $teacher)->with('info', 'Maestro modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index', $teacher)->with('info', 'Maestro eliminado con exito');
    }
}
