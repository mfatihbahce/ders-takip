<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\SchoolClass;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'totalApplications' => Application::count(),
            'pendingApplications' => Application::where('status', 'yeni')->count(),
            'activeClasses' => SchoolClass::where('is_active', true)->count(),
        ];

        $latestApplications = Application::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestApplications'));
    }
}
