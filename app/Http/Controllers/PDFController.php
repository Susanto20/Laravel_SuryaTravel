<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        $syarat = Order::all();
        $users  = User::all();
        $pdf = PDF::loadView('welcome', compact('syarat', 'users'));

        return $pdf->download('Laporan.pdf');
    }
}
