<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role=='admin') {
            return $this->adminDashboard();
        } elseif ($user->role=='prodi') {
            return $this->prodiDashboard();
        } else {
            return $this->userDashboard();
        }
    }
    private function adminDashboard()
    {
        // Prepare data and view for admin dashboard
        $data = [
            // Data specific to the admin dashboard
        ];

        return view('pages.admin.master', $data);
    }

    private function prodiDashboard()
    {
        // Prepare data and view for editor dashboard
        $data = [
            // Data specific to the editor dashboard
        ];

        return view('pages.prodi.dashboard', $data);
    }

    private function userDashboard()
    {
        // Prepare data and view for user dashboard
        $data = [
            // Data specific to the user dashboard
        ];

        return view('pages.mahasiswa.master', $data);
    }
}
