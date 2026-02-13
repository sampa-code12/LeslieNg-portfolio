@extends('layouts.folio')

@section('title', 'Avis')
@section('page_title', 'Avis et Témoignages')
@section('page_subtitle', 'Consultez les avis et témoignages de nos clients')

@section('content')

<!-- Hero Section -->
<section style="margin-top: 100px; padding: 60px 0; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h1 data-aos="fade-up" style="font-size: 3rem; margin-bottom: 20px;">Avis & Témoignages</h1>
        <p data-aos="fade-up" data-aos-delay="100" style="font-size: 1.1rem;">Découvrez ce que nos clients pensent de nos services</p>
      </div>
      <div class="col-lg-4 text-end" data-aos="fade-left" data-aos-delay="200">
        <a href="{{ route('avis.create') }}" class="btn btn-light btn-lg"><i class="bi bi-plus-circle"></i> Ajouter un Avis</a>
      </div>
    </div>
  </div>
</section>

<!-- Alerts Section -->
<div class="container mt-5" data-aos="fade-up">
  @if($message = Session::get('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle"></i> {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  @if($error = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="bi bi-exclamation-circle"></i> {{ $error }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif
</div>

<!-- Testimonials Grid -->
<section class="py-5">
  <div class="container">
    {{
    @forelse($avis as $item)
      <div class="col-lg-4 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
        <div class="card testimonial-card h-100" style="border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.1); border-radius: 15px; transition: all 0.3s ease;">
          <div class="card-body p-4">
            <!-- Stars -->
            <div class="mb-3">
              <i class="bi bi-star-fill" style="color: #ffc107;"></i>
              <i class="bi bi-star-fill" style="color: #ffc107;"></i>
              <i class="bi bi-star-fill" style="color: #ffc107;"></i>
              <i class="bi bi-star-fill" style="color: #ffc107;"></i>
              <i class="bi bi-star-fill" style="color: #ffc107;"></i>
            </div>
            
            <!-- Message -->
            <p class="card-text" style="font-style: italic; color: #555;">"{{ Str::limit($item->message, 120) }}"</p>
            
            <!-- Date -->
            @if($item->published_at)
            <small class="text-muted d-block mb-3">
              @if(is_string($item->published_at))
                {{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}
              @else
                {{ $item->published_at->format('d M Y') }}
              @endif
            </small>
            @else
            <small class="text-muted d-block mb-3">Not published</small>
            @endif
            
            <!-- Actions -->
            <div class="btn-group" role="group">
              <a href="{{ route('avis.show', $item->id) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> Voir</a>
              <a href="{{ route('avis.edit', $item->id) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i> Éditer</a>
              <form action="{{ route('avis.destroy', $item->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Êtes-vous sûr?')"><i class="bi bi-trash"></i> Supp.</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @empty
      <div class="col-12 text-center py-5">
        <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
        <p class="text-muted mt-3" style="font-size: 1.1rem;">Aucun avis trouvé. Soyez le premier à partager votre avis!</p>
      </div>
    @endforelse
    }}
  </div>
</section>

@endsection
