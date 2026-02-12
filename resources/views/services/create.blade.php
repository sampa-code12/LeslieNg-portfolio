@extends('layouts.folio')

@section('title', 'Ajouter un Service')

@section('content')

<!-- Hero Section -->
<section style="margin-top: 100px; padding: 60px 0; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
  <div class="container">
    <h1 data-aos="fade-up" style="font-size: 2.5rem;">Créer un Nouveau Service</h1>
    <p data-aos="fade-up" data-aos-delay="100">Ajoutez un service à votre portefeuille</p>
  </div>
</section>

<!-- Form Section -->
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10" data-aos="fade-up">
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

            <form action="{{ route('services.store') }}" method="POST">
              @csrf

              <div class="row">
                <div class="col-md-6 mb-4">
                  <label for="title" class="form-label" style="font-weight: 600; font-size: 1rem;"><i class="bi bi-type"></i> Titre</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" 
                         id="title" name="title" placeholder="Nom du service" required 
                         value="{{ old('title') }}" style="border-radius: 10px; border: 2px solid #e0e0e0;">
                  @error('title')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-6 mb-4">
                  <label for="category" class="form-label" style="font-weight: 600; font-size: 1rem;"><i class="bi bi-tag"></i> Catégorie</label>
                  <input type="text" class="form-control @error('category') is-invalid @enderror" 
                         id="category" name="category" placeholder="Ex: Design, Développement" required 
                         value="{{ old('category') }}" style="border-radius: 10px; border: 2px solid #e0e0e0;">
                  @error('category')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="mb-4">
                <label for="slug" class="form-label" style="font-weight: 600; font-size: 1rem;"><i class="bi bi-link-45deg"></i> Slug (Optionnel)</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                       id="slug" name="slug" placeholder="service-slug" 
                       value="{{ old('slug') }}" style="border-radius: 10px; border: 2px solid #e0e0e0;">
                @error('slug')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-4">
                <label for="description" class="form-label" style="font-weight: 600; font-size: 1rem;"><i class="bi bi-chat-dots"></i> Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="5" 
                          placeholder="Décrivez votre service en détail..." required
                          style="border-radius: 10px; border: 2px solid #e0e0e0;">{{ old('description') }}</textarea>
                @error('description')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>

              <div class="d-flex gap-3">
                <button type="submit" class="btn btn-primary btn-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                  <i class="bi bi-plus-circle"></i> Créer le Service
                </button>
                <a href="{{ route('services.index') }}" class="btn btn-outline-secondary btn-lg">
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
