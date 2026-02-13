<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FolioController extends Controller
{
    public function index()
    {
        $services = Service::limit(3)->get();
        $skills = Skill::limit(6)->get();
        $avis = Avis::all();
        return view('folio.index', compact('services', 'skills', 'avis'));
    }

    public function about()
    {
        $services = Service::skip(3)->take(3)->get();
        $skills = Skill::limit(6)->get();
        $avis = Avis::all();
        return view('folio.about', compact('services', 'skills', 'avis'));
    }

    public function resume()
    {
        $educations = Resume::where('type', 'education')->get();
        $experiences = Resume::where('type', 'experience')->get();
        $skills = Resume::where('type', 'skill')->get();
        return view('folio.resume', compact('educations', 'experiences', 'skills'));
    }

    public function services()
    {
        return view('folio.services');
    }

    public function portfolio()
    {
        return view('folio.portfolio');
    }

    public function contact()
    {
        $avis = Avis::all();
        return view('folio.contact', compact('avis'));
    }

    public function serviceDetails()
    {
        return view('folio.service-details');
    }

    public function portfolioDetails()
    {
        return view('folio.portfolio-details');
    }

    public function starterPage()
    {
        return view('folio.starter-page');
    }

    /**
     * Store contact form submission
     */
    public function storeContact(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:5000',
        ], [
            'name.required' => 'Le nom est requis.',
            'email.required' => 'L\'email est requis.',
            'email.email' => 'L\'email doit être valide.',
            'subject.required' => 'Le sujet est requis.',
            'message.required' => 'Le message est requis.',
            'message.min' => 'Le message doit contenir au moins 10 caractères.',
        ]);

        // Log the contact message (you can replace this with database storage or email sending)
        Log::info('Contact form submission', $validated);

        // Optionally: Store in database
        // \DB::table('contact_messages')->insert($validated + ['created_at' => now()]);

        // Optionally: Send email (uncomment to use)
        // \Mail::send('emails.contact', $validated, function($message) use ($validated) {
        //     $message->to(config('mail.from.address'))
        //             ->replyTo($validated['email'])
        //             ->subject('Nouveau message de contact: ' . $validated['subject']);
        // });

        // Return response
        return redirect()->route('folio.contact')
                       ->with('success', 'Votre message a été envoyé avec succès. Nous vous répondrons bientôt!');
    }
}
