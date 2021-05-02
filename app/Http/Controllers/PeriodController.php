<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\StorePeriodRequest;
use App\Http\Requests\UpdatePeriodRequest;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('periods.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentDate = Carbon::now('America/Mazatlan')->format('Y-m-d'); 
        return view('periods.create', compact('currentDate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeriodRequest $request)
    {
        //return $request->all();
        $period = Period::create($request->all());
        return redirect()->route('periods.edit', $period)->with('info', 'Periodo creado con exito');

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
    public function edit(Period $period)
    {
        return view('periods.edit',  compact('period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeriodRequest $request, Period $period)
    {
        $period->update($request->all());
        return redirect()->route('periods.edit', $period)->with('info', 'El periodo se actualizo en exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        $period->delete();
        return redirect()->route('periods.index')->with('info', 'El periodo se elimino en exito');
    }
}
