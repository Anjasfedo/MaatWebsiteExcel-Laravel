<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Exports\UsersExport;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function fileImportExport()
    {
        $dataUser = User::get()->all();
        return view('file-import', compact("dataUser"));
    }

    public function fileImport(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xlsx,xls,csv', // Anda dapat menyesuaikan jenis file yang diizinkan
        ]);

        Excel::import(new UsersImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data berhasil diimpor.');
    }

    public function fileExport()
    {
        $dataUser = User::select('id', 'name', 'email')->get();

        return Excel::download(new UsersExport($dataUser), 'users.xlsx');
    }
}
