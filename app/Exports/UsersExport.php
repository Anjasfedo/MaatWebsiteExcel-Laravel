<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

// use Illuminate\Contracts\View\View;
// use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'no',
            'nama',
            'email',
        ];
    }
}

// class UsersExport implements FromView
// {
//     public function view(): View
//     {
//         return view('file-import', [
//             'dataUser' => User::all()
//         ]);
//     }
// }
