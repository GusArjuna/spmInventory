<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\LaporanPenjualan;
use App\Models\SukuCadang;
use App\Models\Teknisi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use stdClass;

class DashboardControlller extends Controller
{
    public function index(){
        
        $penjualanTerbanyak = DB::table('laporan_penjualans')
            ->join('suku_cadangs', 'laporan_penjualans.nama', '=', 'suku_cadangs.nomor')
            ->select('suku_cadangs.nomor', 'suku_cadangs.nama as suku_cadangs_nama', DB::raw('SUM(laporan_penjualans.jumlah) as total_laporan_penjualans'))
            ->groupBy('suku_cadangs.nomor', 'suku_cadangs.nama')
            ->orderBy('total_laporan_penjualans', 'desc')
            ->first();

        $sukuCadangTerbanyak = SukuCadang::select('nomor', 'nama', 'stock')
            ->orderBy('stock', 'desc')
            ->first();

        $totalTransaksiBulanIni = LaporanPenjualan::whereYear('tanggal', Carbon::now()->year)
            ->whereMonth('tanggal', Carbon::now()->month)
            ->count();
        
        $sukuCadangTerlarisBulanIni = LaporanPenjualan::join('suku_cadangs', 'laporan_penjualans.nama', '=', 'suku_cadangs.nomor')
            ->select('suku_cadangs.nomor', 'suku_cadangs.nama', DB::raw('SUM(laporan_penjualans.jumlah) as total_penjualan'))
            ->whereYear('laporan_penjualans.tanggal', Carbon::now()->year)
            ->whereMonth('laporan_penjualans.tanggal', Carbon::now()->month)
            ->groupBy('suku_cadangs.nomor', 'suku_cadangs.nama')
            ->orderBy('total_penjualan', 'desc')
            ->first();
        ///
        $totalTransaksiBulanan = [];
        $months = [];
        
        for ($i = 0; $i < 12; $i++) {
            $bulan = Carbon::now()->subMonths($i);
            $jumlahTransaksi = LaporanPenjualan::whereYear('tanggal', $bulan->year)
                ->whereMonth('tanggal', $bulan->month)
                ->count(); // Jumlah transaksi per bulan
    
            $totalTransaksiBulanan[] = $jumlahTransaksi;
            $months[] = $bulan->format('M Y');
        }

        $totalTransaksiBulanan = array_reverse($totalTransaksiBulanan);
        $months = array_reverse($months);
        ///

        $total = new stdClass();
        $total->sukucadang = SukuCadang::count();
        $total->alat = Alat::count();
        $total->teknisi = Teknisi::count();
 
        ///
        
        return view("home",[
            "title" => "SPM || Dashboard",
            "pages" => "Dashboard",
            "penjualanTerbanyak" => $penjualanTerbanyak,
            "sukuCadangTerbanyak" => $sukuCadangTerbanyak,
            "totalTransaksiBulanIni" => $totalTransaksiBulanIni,
            "sukuCadangTerlarisBulanIni" => $sukuCadangTerlarisBulanIni,
            "totalTransaksiBulanan" => $totalTransaksiBulanan, 
            "months" => $months,
            "total" => $total,
        ]);
    }
    public function indexLogin(){
        return view("login",[
            "title" => "SPM || Login",
            
        ]);
    }

    public function loginAccount(Request $request):RedirectResponse{
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/home');
        }
 
        return back()->with('danger','Username / Password Salah');
    }

    public function indexRegister(){
        return view("register",[
            "title" => "SPM || Register",
            
        ]);
    }

    public function registerAccount(Request $request){
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $validatedData['password']=bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success','Berhasil Register');
    }

    public function logout (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
