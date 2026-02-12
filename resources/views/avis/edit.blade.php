@extends('layouts.folio')

@section('title', 'Éditer Avis')

@section('content')

<!-- Hero Section -->
<section style="margin-top: 100px; padding: 60px 0; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
  <div class="container">
    <h1 data-aos="fade-up" style="font-size: 2.5rem;">Éditer votre Avis</h1>
    <p data-aos="fade-up" data-aos-delay="100">Modifiez votre message dans les 60 minutes</p>
  </div>
</section>

<!-- Form Section -->
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8" data-aos="fade-up">
        <div class="card" style="border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.1); border-radius: 15px;">
          <div class="card-body p-5">
            
            @if($errors->any())
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5><i class="bi bi-exclamation-circle"></i> Erreurs détectées:</h5>
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            @endif

            <form action="{{ route('avis.update', $avis->id) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="mb-4">
                <label for="message" class="form-label" style="font-weight: 600; font-size: 1.1rem;"><i class="bi bi-chat-dots"></i> Votre Avis</label>
                <textarea class="form-control @error('message') is-invalid @enderror" 
                          id="message" name="message" rows="6"
                          style="border-radius: 10px; border: 2px solid #e0e0e0; font-size: 1rem;"
                          required>{{ old('message', $avis->message) }}</textarea>
                <small class="text-muted">Maximum 500 caractères</small>
                @error('message')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>

              <div class="d-flex gap-3">
                <button type="submit" class="btn btn-primary btn-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                  <i class="bi bi-check-circle"></i> Mettre à jour
                </button>
                <a href="{{ route('avis.index') }}" class="btn btn-outline-secondary btn-lg">
                  <i class="bi bi-arrow-left"></i> Annuler
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
