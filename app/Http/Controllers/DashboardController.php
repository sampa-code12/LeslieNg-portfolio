<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Skill;
use App\Models\Avis;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $servicesCount = Service::count();
        $skillsCount = Skill::count();
        $avisCount = Avis::count();
        
        $recentServices = Service::latest()->limit(5)->get();
        $recentSkills = Skill::latest()->limit(5)->get();
        $recentAvis = Avis::latest()->limit(5)->get();

        return view('dashboard.index', compact(
            'servicesCount',
            'skillsCount',
            'avisCount',
            'recentServices',
            'recentSkills',
            'recentAvis'
        ));
    }
}
