<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    public function index(): View
    {
        $applications = Application::with('classes')->latest()->paginate(12);

        return view('admin.applications.index', compact('applications'));
    }
}
