@extends('layouts.folio')

@section('title', 'Détail Avis')

@section('content')

<!-- Hero Section -->
<section style="margin-top: 100px; padding: 60px 0; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-8">
        <h1 data-aos="fade-up" style="font-size: 2.5rem;">Détail de l'Avis</h1>
      </div>
      <div class="col-md-4 text-end" data-aos="fade-left">
        <a href="{{ route('avis.index') }}" class="btn btn-light"><i class="bi bi-arrow-left"></i> Retour</a>
      </div>
    </div>
  </div>
</section>

<!-- Content Section -->
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8" data-aos="fade-up">
        <div class="card" style="border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.1); border-radius: 15px;">
          <div class="card-body p-5">
            
            <!-- Stars Rating -->
            <div class="mb-4">
              <i class="bi bi-star-fill" style="color: #ffc107; font-size: 1.5rem;"></i>
              <i class="bi bi-star-fill" style="color: #ffc107; font-size: 1.5rem;"></i>
              <i class="bi bi-star-fill" style="color: #ffc107; font-size: 1.5rem;"></i>
              <i class="bi bi-star-fill" style="color: #ffc107; font-size: 1.5rem;"></i>
              <i class="bi bi-star-fill" style="color: #ffc107; font-size: 1.5rem;"></i>
            </div>

            <!-- Message -->
            <p class="card-text" style="font-size: 1.1rem; line-height: 1.8; color: #333; font-style: italic;">
              "{{ $avis->message }}"
            </p>
            
            <!-- Meta Info -->
            <hr>
            <div class="mt-4">
              <small class="text-muted">
                <i class="bi bi-calendar3"></i> Publié: {{ $avis->published_at ? $avis->published_at->format('d F Y à H:i') : 'N/A' }}
              </small>
            </div>

            <!-- Actions -->
            <div class="mt-5 d-flex gap-2 flex-wrap">
              <a href="{{ route('avis.edit', $avis->id) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Éditer
              </a>
              <form action="{{ route('avis.destroy', $avis->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr?')">
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
