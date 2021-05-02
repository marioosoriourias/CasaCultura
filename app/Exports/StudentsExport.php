<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StudentsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       
        return Student::select('id','name','age','gender','phone','address', 'email')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Edad',
            'Sexo',
            'Telefono',
            'Direccion',
            'Email'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            'A1:G1'   => ['font' => ['bold' => true]]
        ];
    }
}
