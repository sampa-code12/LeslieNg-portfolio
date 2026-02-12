@extends('layouts.folio')

@section('title', 'Services')
@section('page_title', 'Nos Services')
@section('page_subtitle', 'Découvrez nos services professionnels')

@section('content')

<!-- Hero Section -->
<section style="margin-top: 100px; padding: 40px 0 60px 0;">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 data-aos="fade-up" style="font-size: 3rem; margin-bottom: 15px; color: #333; font-weight: 700;">Nos Services</h1>
        <p data-aos="fade-up" data-aos-delay="100" style="font-size: 1.1rem; color: #666; margin-bottom: 30px;">Découvrez notre gamme complète de services professionnels</p>
        <a href="{{ route('services.create') }}" class="btn btn-primary" data-aos="zoom-in" data-aos-delay="200"><i class="bi bi-plus-circle"></i> Ajouter Service</a>
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
</div>

<!-- Services Grid -->
<section class="py-5">
  <div class="container">
    <div class="row">
      @forelse($services as $service)
        <div class="col-lg-4 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
          <div class="card service-card h-100" style="border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.1); border-radius: 15px; transition: all 0.3s ease; overflow: hidden;">
            <!-- Color bar -->
            <div style="height: 5px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"></div>
            
            <div class="card-body p-4">
              <!-- Icon -->
              <div class="mb-3" style="font-size: 2.5rem; color: #667eea;">
                <i class="bi bi-briefcase"></i>
              </div>
              
              <!-- Title -->
              <h5 class="card-title" style="font-weight: 700; font-size: 1.3rem; color: #333;">{{ $service->title }}</h5>
              
              <!-- Category -->
              <p class="mb-3">
                <span class="badge" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">{{ $service->category }}</span>
              </p>
              
              <!-- Description -->
              <p class="card-text" style="color: #666; line-height: 1.6;">{{ Str::limit($service->description, 80) }}</p>
              
              <!-- Date -->
              <small class="text-muted d-block mb-3">
                <i class="bi bi-calendar3"></i> {{ $service->published_at ? $service->published_at->format('d M Y') : 'N/A' }}
              </small>
              
              <!-- Actions -->
              <div class="btn-group w-100" role="group">
                <a href="{{ route('services.show', $service->id) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></a>
                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a>
                <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Êtes-vous sûr?')"><i class="bi bi-trash"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-5">
          <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
          <p class="text-muted mt-3" style="font-size: 1.1rem;">Aucun service trouvé. Commencez par en créer un!</p>
        </div>
      @endforelse
    </div>
  </div>
</section>

@endsection
