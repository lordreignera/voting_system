<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Get dashboard statistics
        $voterCount = User::role('Voter')->count();
        
        return view('admin.dashboard', compact('voterCount'));
    }
}
