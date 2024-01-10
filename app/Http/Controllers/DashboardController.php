<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perjadin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', [
            'title'         => 'Dashboard',
            'countPerjadin' => Perjadin::count(),
            'countPerjadinB' => Perjadin::sum('biaya'),
            'countPegawai'  => User::count(),
        ]);
    }
}
