<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalKategori' => Category::count(),
            'totalProduk' => Product::count(),
            'totalUser' => User::count(),
        ]);
    }
}