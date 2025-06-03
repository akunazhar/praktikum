<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    /**
     * Menampilkan halaman dashboard.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function dashboard(Request $request)
    {
        return view('dashboard');
    }

    /**
     * Menampilkan daftar semua user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function users(Request $request)
    {
        $users = User::all(); // Lebih baik menggunakan all() jika tidak ada filter
        return view('users', compact('users'));
    }

    /**
     * Generate dan tampilkan PDF data user.
     *
     * @return \Illuminate\Http\Response
     */
    public function printPdf()
    {
        $users = User::get();

        $data = [
            'title' => 'Welcome To fti.uniska-bjm.ac.id',
            'date' => date('m/d/Y'),
            'users' => $users
        ];

        $pdf = PDF::loadview('userpdf', $data);
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('Data User.pdf', array("attachment" => false));
        
    }
    public function userExcel()
{
    $users = User::get();
    $data = [
        'title' => 'Welcome To fti.uniska-bjm.ac.id',
        'date' => date('m/d/Y'),
        'users' => $users
    ];
    return view('userexcel', $data);
}

}
