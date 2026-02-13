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
        return view('dashboard.index');
    }
    
    public function section($section)
    {
        switch($section) {
            case 'dashboard':
                return $this->getDashboardSection();
            
            // Services
            case 'services-index':
                return $this->getServicesIndexSection();
            case 'services-create':
                return $this->getServicesCreateSection();
            
            // Skills
            case 'skills-index':
                return $this->getSkillsIndexSection();
            case 'skills-create':
                return $this->getSkillsCreateSection();
            
            // Testimonials
            case 'testimonials-index':
                return $this->getTestimonialsIndexSection();
            case 'testimonials-create':
                return $this->getTestimonialsCreateSection();
            
            default:
                return response()->json(['error' => 'Section non trouvée'], 404);
        }
    }
    
    private function getDashboardSection()
    {
        $html = view('dashboard.sections.dashboard', [
            'servicesCount' => Service::count(),
            'skillsCount' => Skill::count(),
            'avisCount' => Avis::count(),
            'recentServices' => Service::latest()->limit(5)->get(),
        ])->render();
        
        return response()->json([
            'title' => 'Dashboard',
            'html' => $html
        ]);
    }
    
    private function getServicesIndexSection()
    {
        $html = view('dashboard.sections.services-index', [
            'services' => Service::paginate(10)
        ])->render();
        
        return response()->json([
            'title' => 'Services',
            'html' => $html
        ]);
    }
    
    private function getServicesCreateSection()
    {
        $html = view('dashboard.sections.services-create')->render();
        
        return response()->json([
            'title' => 'Create Service',
            'html' => $html
        ]);
    }
    
    private function getSkillsIndexSection()
    {
        $html = view('dashboard.sections.skills-index', [
            'skills' => Skill::paginate(10)
        ])->render();
        
        return response()->json([
            'title' => 'Skills',
            'html' => $html
        ]);
    }
    
    private function getSkillsCreateSection()
    {
        $html = view('dashboard.sections.skills-create')->render();
        
        return response()->json([
            'title' => 'Create Skill',
            'html' => $html
        ]);
    }
    
    private function getTestimonialsIndexSection()
    {
        $html = view('dashboard.sections.testimonials-index', [
            'testimonials' => Avis::paginate(10)
        ])->render();
        
        return response()->json([
            'title' => 'Testimonials',
            'html' => $html
        ]);
    }
    
    private function getTestimonialsCreateSection()
    {
        $html = view('dashboard.sections.testimonials-create')->render();
        
        return response()->json([
            'title' => 'Create Testimonial',
            'html' => $html
        ]);
    }
    
    public function showDetail($type, $id)
    {
        switch($type) {
            case 'services':
                $item = Service::findOrFail($id);
                $html = view('dashboard.sections.service-detail', ['service' => $item])->render();
                return response()->json([
                    'title' => $item->title,
                    'html' => $html
                ]);
            case 'skills':
                $item = Skill::findOrFail($id);
                $html = view('dashboard.sections.skill-detail', ['skill' => $item])->render();
                return response()->json([
                    'title' => $item->name,
                    'html' => $html
                ]);
            case 'testimonials':
            case 'avis':
                $item = Avis::findOrFail($id);
                $html = view('dashboard.sections.testimonial-detail', ['testimonial' => $item])->render();
                return response()->json([
                    'title' => $item->author ?? 'Testimonial',
                    'html' => $html
                ]);
            default:
                return response()->json(['error' => 'Type non trouvé'], 404);
        }
    }
    
    public function editFormDetail($type, $id)
    {
        switch($type) {
            case 'services':
                $item = Service::findOrFail($id);
                $html = view('dashboard.sections.service-edit-form', ['service' => $item])->render();
                return response()->json([
                    'title' => 'Service',
                    'html' => $html
                ]);
            case 'skills':
                $item = Skill::findOrFail($id);
                $html = view('dashboard.sections.skill-edit-form', ['skill' => $item])->render();
                return response()->json([
                    'title' => 'Skill',
                    'html' => $html
                ]);
            case 'testimonials':
            case 'avis':
                $item = Avis::findOrFail($id);
                $html = view('dashboard.sections.testimonial-edit-form', ['testimonial' => $item])->render();
                return response()->json([
                    'title' => 'Testimonial',
                    'html' => $html
                ]);
            default:
                return response()->json(['error' => 'Type non trouvé'], 404);
        }
    }
    
    private function getServicesSection()
    {
        $html = view('dashboard.sections.services', [
            'services' => Service::paginate(10)
        ])->render();
        
        return response()->json([
            'title' => 'Services',
            'html' => $html
        ]);
    }
    
    private function getSkillsSection()
    {
        $html = view('dashboard.sections.skills', [
            'skills' => Skill::paginate(10)
        ])->render();
        
        return response()->json([
            'title' => 'Skills',
            'html' => $html
        ]);
    }
    
    private function getTestimonialsSection()
    {
        $html = view('dashboard.sections.testimonials', [
            'testimonials' => Avis::paginate(10)
        ])->render();
        
        return response()->json([
            'title' => 'Testimonials',
            'html' => $html
        ]);
    }
}
