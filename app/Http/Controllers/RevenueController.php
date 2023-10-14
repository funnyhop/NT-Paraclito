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
        $month_pay = DB::table('ghipns')
            ->join('phieunhaps', 'ghipns.phieunhap_id', '=', 'phieunhaps.PNID')
            ->select(DB::raw('SUM(Soluong*Gia) as pay'))
            ->whereRaw('MONTH(phieunhaps.created_at) = MONTH(NOW())')
            ->first();
//(giaban x soluong bán - gia nhập x soluong bán) - (giaban x soluong bán - gia nhập x soluong bán)*10%
        $month_increment = DB::table('medicines')
            ->join('ghipns', 'medicines.ThuocID', '=', 'ghipns.medicine_id')
            ->join('ghihds', 'medicines.ThuocID', '=', 'ghihds.medicine_id')
            ->join('bills', 'ghihds.bill_id', '=', 'bills.HDID')
            ->join('prices', 'medicines.ThuocID', '=', 'prices.medicine_id')
            ->select(DB::raw('(prices.Gia*ghihds.Soluong - ghipns.Gia*ghihds.Soluong) as increment'))
            ->whereRaw('MONTH(bills.created_at) = MONTH(NOW())')
            ->first();

        $day_dangerous = DB::table('ghipns')
            ->join('phieunhaps', 'ghipns.phieunhap_id', '=', 'phieunhaps.PNID')
            ->select(DB::raw('SUM(Soluong*Gia) as pay'))
            ->whereRaw('MONTH(phieunhaps.created_at) = MONTH(NOW())')
            ->first();

        return view('checks.revenue', compact('day_dangerous','month_increment','month_pay','months', 'years', 'day_revenue','month_revenue'));
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
            ->whereRaw('MONTH(phieunhaps.created_at) = MONTH(NOW())')
            ->first();
        $month_increment = DB::table('medicines')
            ->join('ghipns', 'medicines.ThuocID', '=', 'ghipns.medicine_id')
            ->join('ghihds', 'medicines.ThuocID', '=', 'ghihds.medicine_id')
            ->join('bills', 'ghihds.bill_id', '=', 'bills.HDID')
            ->join('prices', 'medicines.ThuocID', '=', 'prices.medicine_id')
            ->select(DB::raw('(prices.Gia*ghihds.Soluong - ghipns.Gia*ghihds.Soluong) as increment'))
            ->whereRaw('MONTH(bills.created_at) = ?', [$this->month])
            ->first();
        return view('checks.revenue', compact('month_increment','month_pay','months', 'years', 'day_revenue', 'month_revenue', 'year_revenue'));
    }
}
