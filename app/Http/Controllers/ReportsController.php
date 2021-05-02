<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TeachersExport;
use App\Exports\StudentsExport;

class ReportsController extends Controller
{
    public function TeachersExcel()
    {
        return Excel::download(new TeachersExport, 'lista-de-maestros.xlsx');
    }

    public function StudentsExcel()
    {
        return Excel::download(new StudentsExport, 'lista-de-alumnos.xlsx');
    }
}
