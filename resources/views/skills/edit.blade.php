@extends('layouts.folio')

@section('title', 'Editer Competence')

@section('content')

<!-- Hero Section -->
<section style="margin-top: 100px; padding: 60px 0; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
  <div class="container">
    <h1 data-aos="fade-up" style="font-size: 2.5rem;">Editer la Competence</h1>
    <p data-aos="fade-up" data-aos-delay="100">Mettez a jour les details de votre competence</p>
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
                <h5><i class="bi bi-exclamation-circle"></i> Erreurs detectees:</h5>
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            @endif

            <form action="{{ route('skills.update', $skill->id) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="mb-4">
                <label for="name" class="form-label" style="font-weight: 600; font-size: 1rem;"><i class="bi bi-type"></i> Nom</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" required 
                       value="{{ old('name', $skill->name) }}" style="border-radius: 10px; border: 2px solid #e0e0e0;">
                @error('name')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">
                  <label for="category" class="form-label" style="font-weight: 600; font-size: 1rem;"><i class="bi bi-tag"></i> Categorie</label>
                  <input type="text" class="form-control @error('category') is-invalid @enderror" 
                         id="category" name="category" required 
                         value="{{ old('category', $skill->category) }}" style="border-radius: 10px; border: 2px solid #e0e0e0;">
                  @error('category')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-6 mb-4">
                  <label for="level" class="form-label" style="font-weight: 600; font-size: 1rem;"><i class="bi bi-award"></i> Niveau</label>
                  <select class="form-select @error('level') is-invalid @enderror" 
                          id="level" name="level" style="border-radius: 10px; border: 2px solid #e0e0e0;">
                    <option value="">-- Selectionner --</option>
                    <option value="Debutant" {{ old('level', $skill->level) == 'Debutant' ? 'selected' : '' }}>Debutant</option>
                    <option value="Intermediaire" {{ old('level', $skill->level) == 'Intermediaire' ? 'selected' : '' }}>Intermediaire</option>
                    <option value="Avance" {{ old('level', $skill->level) == 'Avance' ? 'selected' : '' }}>Avance</option>
                    <option value="Expert" {{ old('level', $skill->level) == 'Expert' ? 'selected' : '' }}>Expert</option>
                  </select>
                  @error('level')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="d-flex gap-3">
                <button type="submit" class="btn btn-primary btn-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                  <i class="bi bi-check-circle"></i> Mettre a jour
                </button>
                <a href="{{ route('skills.index') }}" class="btn btn-outline-secondary btn-lg">
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
