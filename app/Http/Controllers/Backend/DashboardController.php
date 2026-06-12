<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session()->has('admin_id')) {
            return redirect('/');
        }

        $nama = session('admin_name');

        return view('backend.dashboard.index', compact('nama'));
    }
}