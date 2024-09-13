<?php

namespace App\Http\Controllers;

use App\Models\tablevente;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TableventeController extends Controller
{
    
public function generateReport(Request $request)
{
    $month = Carbon::parse($request->input('month'))->format('m');
    $year = Carbon::parse($request->input('month'))->format('Y');

    $ventes = tablevente::whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->select([
            'client',
            'product',
            'adresse',
            'created_at',
            'totalprix',
            'qte',
           
        ])
        ->get();
        $totalprix = $ventes->sum('totalprix');
        $month=$request->month;

    // Share the data with the view
    $pdf = pdf::loadView('ventes', compact('ventes','totalprix','month'));

    return $pdf->download('сату туралы есеп.pdf');
}}
