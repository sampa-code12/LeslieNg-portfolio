@extends('layouts.folio')

@section('title', 'Detail Competence')

@section('content')

<!-- Hero Section -->
<section style="margin-top: 100px; padding: 60px 0; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-8">
        <h1 data-aos="fade-up" style="font-size: 2.5rem;">{{ $skill->name }}</h1>
        <p data-aos="fade-up" data-aos-delay="100"><span class="badge bg-light text-dark">{{ $skill->category }}</span></p>
      </div>
      <div class="col-md-4 text-end" data-aos="fade-left">
        <a href="{{ route('skills.index') }}" class="btn btn-light"><i class="bi bi-arrow-left"></i> Retour</a>
      </div>
    </div>
  </div>
</section>

<!-- Content Section -->
<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-8" data-aos="fade-up">
        <div class="card" style="border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.1); border-radius: 15px;">
          <div class="card-body p-5">
            
            <!-- Category -->
            <div class="mb-4">
              <h6 style="color: #999; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 2px;">Categorie</h6>
              <span class="badge" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); font-size: 1rem; padding: 8px 15px;">{{ $skill->category }}</span>
            </div>

            <!-- Level -->
            @if($skill->level)
              <div class="mb-4 p-3" style="background: #f8f9ff; border-radius: 10px; border-left: 4px solid #667eea;">
                <h6 style="color: #999; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 10px;">Niveau</h6>
                <p style="font-size: 1.2rem; color: #333; margin: 0;">
                  <i class="bi bi-award" style="color: #ffc107; margin-right: 10px;"></i>
                  <strong>{{ $skill->level }}</strong>
                </p>
              </div>
            @endif
            
            <!-- Info -->
            <div class="mb-4">
              <h4 style="color: #333; font-weight: 700; margin-top: 20px; margin-bottom: 15px;">A propos de cette competence</h4>
              <p style="font-size: 1rem; line-height: 1.8; color: #666;">Cette competence dans le domaine de <strong>{{ $skill->category }}</strong> represente un niveau <strong>{{ strtolower($skill->level ?? 'inconnue') }}</strong> d'expertise.</p>
            </div>
            
            <!-- Meta Info -->
            <hr>
            <div class="mt-4">
              <small class="text-muted">
                <i class="bi bi-calendar3"></i> Ajoute: {{ $skill->published_at->format('d F Y H:i') }}
              </small>
            </div>

            <!-- Actions -->
            <div class="mt-5 d-flex gap-2 flex-wrap">
              <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Editer
              </a>
              <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Confirmation?')">
                  <i class="bi bi-trash"></i> Supprimer
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
