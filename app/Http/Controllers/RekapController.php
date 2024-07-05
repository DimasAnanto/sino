<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use PDF;
use Carbon\Carbon;

class RekapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
      $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

    $customer = DB::table('customer')
    ->select('users.name as user_name', 
             DB::raw('SUM(IF(customer.status = "disetujui", 1, 0)) AS disetujui_count'),
             DB::raw('SUM(IF(customer.status = "pending", 1, 0)) AS pending_count'),
             DB::raw('SUM(IF(customer.status = "batal", 1, 0)) AS batal_count'))
    ->join('users', 'customer.id_user', '=', 'users.id')
    ->whereBetween('customer.created_at', [$startDate, $endDate])
    ->groupBy('users.name')
    ->get();
            
            
            return view('rekap.rekap_customer_admin_view')->with(compact('customer'));
        }
      
  
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
}
