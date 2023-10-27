<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Day;

use Illuminate\Http\Request;

class RevenueController extends Controller
{
    protected $year;
    protected $month;
    public function index()
    {
        $years = DB::table('days')
            ->select(DB::raw('YEAR(Ngay) as year'))
            ->distinct()
            ->get();

        $months = DB::table('days')
            ->select(DB::raw('MONTH(Ngay) as month'))
            ->distinct()
            ->get();
        $day_revenue = DB::table('bills')
            ->select(DB::raw('SUM(Tongtien) as revenue'))
            ->whereRaw('DATE(created_at) = CURDATE()')
            ->first();
        $month_revenue = DB::table('bills')
            ->select(DB::raw('SUM(Tongtien) as revenue'))
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->first();
        $year_revenue = DB::table('bills')
            ->select(DB::raw('SUM(Tongtien) as revenue'))
            ->whereRaw('YEAR(created_at) = YEAR(NOW())')
            ->first();
        // dd($year_revenue);
        $month_pay = DB::table('ghipns')
            ->join('phieunhaps', 'ghipns.phieunhap_id', '=', 'phieunhaps.PNID')
            ->select(DB::raw('SUM(Soluong*Gia) as pay'))
            ->whereRaw('MONTH(phieunhaps.created_at) = MONTH(NOW())')
            ->first();
        $month_increment = ($month_revenue->revenue * 0.95 - $month_pay->pay);
            // dd($month_increment);
        $day_dangerous = DB::table('tonkhos')
            ->join('medicines', 'tonkhos.medicine_id', '=', 'medicines.ThuocID')
            ->select('medicine_id', 'Soluong')
            ->get();
        return view('checks.revenue', compact('day_dangerous','month_increment', 'year_revenue','month_pay','months', 'years', 'day_revenue','month_revenue'));
    }
    public function see_revenue(Request $request)
    {
        // dd($request);
        $this->year = $request->input('nam');
        $this->month = $request->input('thang');
        $years = DB::table('days')
            ->select(DB::raw('YEAR(Ngay) as year'))
            ->distinct()
            ->get();

        $months = DB::table('days')
            ->select(DB::raw('MONTH(Ngay) as month'))
            ->distinct()
            ->get();
        $day_revenue = DB::table('bills')
            ->select(DB::raw('SUM(Tongtien) as revenue'))
            ->whereRaw('DATE(created_at) = CURDATE()')
            ->first();
        $month_revenue = DB::table('bills')
            ->select(DB::raw('SUM(Tongtien) as revenue'))
            ->whereRaw('MONTH(created_at) = ?', [$this->month])
            ->first();

        $year_revenue = DB::table('bills')
            ->select(DB::raw('SUM(Tongtien) as revenue'))
            // ->whereRaw('YEAR(created_at) = ?', [$this->year])
            ->whereYear('created_at', '=', [$this->year])
            ->first();
            // dd($this->year,$month_revenue,$year_revenue);
        $month_pay = DB::table('ghipns')
            ->join('phieunhaps', 'ghipns.phieunhap_id', '=', 'phieunhaps.PNID')
            ->select(DB::raw('SUM(Soluong*Gia) as pay'))
            ->whereRaw('MONTH(phieunhaps.created_at) = ?', [$this->month])
            ->first();
        $month_increment = ($month_revenue->revenue * 0.95 - $month_pay->pay);

        $day_dangerous = DB::table('tonkhos')
            ->join('medicines', 'tonkhos.medicine_id', '=', 'medicines.ThuocID')
            ->select('medicine_id', 'Soluong')
            ->get();

        return view('checks.revenue', compact('day_dangerous','month_increment','month_pay','months', 'years', 'day_revenue', 'month_revenue', 'year_revenue'));
    }
    public function index403(){
        return view('403');
    }
}
