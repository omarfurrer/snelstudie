<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {

    /**
     * Get dashboard page.
     * 
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function getDashboard()
    {
        return view('admin.dashboard');
    }

}
