@extends('layouts.folio')

@section('title', $service->title)

@section('content')

<!-- Hero Section with Gradient Background -->
<section style="margin-top: 100px; padding: 80px 0; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); position: relative; overflow: hidden;">
  <!-- Animated Background Elements -->
  <div style="position: absolute; top: 0; right: 0; width: 400px; height: 400px; background: rgba(255,255,255,0.05); border-radius: 50%; transform: translate(50%, -50%);"></div>
  <div style="position: absolute; bottom: 0; left: 0; width: 300px; height: 300px; background: rgba(255,255,255,0.03); border-radius: 50%; transform: translate(-50%, 50%);"></div>
  
  <div class="container position-relative">
    <div class="row align-items-center">
      <!-- Back Button -->
      <div class="col-12 mb-4">
        <a href="{{ route('services.index') }}" class="btn btn-outline-light btn-sm" style="backdrop-filter: blur(10px); border: 2px solid rgba(255,255,255,0.3);">
          <i class="bi bi-arrow-left"></i> Retour aux services
        </a>
      </div>

      <!-- Icon & Title -->
      <div class="col-12 text-center" data-aos="zoom-in" data-aos-delay="100">
        <div style="font-size: 4rem; color: rgba(255,255,255,0.9); margin-bottom: 30px;">
          <i class="bi bi-briefcase-fill"></i>
        </div>
        <h1 style="font-size: 3.5rem; font-weight: 800; color: white; margin-bottom: 20px; text-shadow: 0 4px 15px rgba(0,0,0,0.2);">
          {{ $service->title }}
        </h1>
        <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap; margin-bottom: 30px;">
          <span class="badge" style="background: rgba(255,255,255,0.2); color: white; font-size: 1rem; padding: 12px 20px; border: 2px solid rgba(255,255,255,0.4); backdrop-filter: blur(10px);">
            <i class="bi bi-tag"></i> {{ $service->category }}
          </span>
          <span class="badge" style="background: rgba(255,255,255,0.2); color: white; font-size: 0.9rem; padding: 12px 20px; border: 2px solid rgba(255,255,255,0.4); backdrop-filter: blur(10px);">
            <i class="bi bi-calendar3"></i> {{ $service->published_at ? $service->published_at->format('d M Y') : 'N/A' }}
          </span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Main Content Section -->
<section class="py-5" style="background: #f9f9f9;">
  <div class="container">
    <div class="row">
      <!-- Main Description Card -->
      <div class="col-lg-8 mx-auto mb-5" data-aos="fade-up">
        <div class="card" style="border: none; box-shadow: 0 15px 50px rgba(0,0,0,0.08); border-radius: 20px; overflow: hidden;">
          <!-- Top Border Gradient -->
          <div style="height: 8px; background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);"></div>
          
          <div class="card-body p-5">
            <!-- Section Title -->
            <div class="mb-4">
              <h2 style="color: #333; font-weight: 700; font-size: 2rem; position: relative; padding-bottom: 15px;">
                À propos de ce service
                <div style="position: absolute; bottom: 0; left: 0; width: 60px; height: 4px; background: linear-gradient(90deg, #667eea 0%, #764ba2 100%); border-radius: 2px;"></div>
              </h2>
            </div>

            <!-- Rich Description -->
            <div style="margin-bottom: 40px;">
              <div style="background: linear-gradient(135deg, rgba(102,126,234,0.05) 0%, rgba(118,75,162,0.05) 100%); padding: 30px; border-radius: 15px; border-left: 5px solid #667eea;">
                <p style="font-size: 1.1rem; line-height: 2; color: #444; margin: 0;">
                  {{ $service->description }}
                </p>
              </div>
            </div>

            <!-- Key Benefits -->
            <div style="margin-bottom: 40px;">
              <h3 style="color: #333; font-weight: 700; margin-bottom: 20px; font-size: 1.3rem;">
                <i class="bi bi-star-fill" style="color: #667eea;"></i> Points clés
              </h3>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <div style="padding: 15px; background: #f5f7ff; border-radius: 10px; border-left: 4px solid #667eea;">
                    <i class="bi bi-check-circle" style="color: #667eea; font-size: 1.3rem;"></i>
                    <span style="color: #444; margin-left: 10px; font-weight: 500;">Service de qualité professionnelle</span>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div style="padding: 15px; background: #f5f7ff; border-radius: 10px; border-left: 4px solid #764ba2;">
                    <i class="bi bi-check-circle" style="color: #764ba2; font-size: 1.3rem;"></i>
                    <span style="color: #444; margin-left: 10px; font-weight: 500;">Support client dédié</span>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div style="padding: 15px; background: #f5f7ff; border-radius: 10px; border-left: 4px solid #667eea;">
                    <i class="bi bi-check-circle" style="color: #667eea; font-size: 1.3rem;"></i>
                    <span style="color: #444; margin-left: 10px; font-weight: 500;">Livraison rapide et fiable</span>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div style="padding: 15px; background: #f5f7ff; border-radius: 10px; border-left: 4px solid #764ba2;">
                    <i class="bi bi-check-circle" style="color: #764ba2; font-size: 1.3rem;"></i>
                    <span style="color: #444; margin-left: 10px; font-weight: 500;">Résultats garantis</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Info Grid -->
            <div style="border-top: 2px solid #e0e0e0; padding-top: 30px; margin-bottom: 30px;">
              <h3 style="color: #333; font-weight: 700; margin-bottom: 20px; font-size: 1.3rem;">
                <i class="bi bi-info-circle" style="color: #667eea;"></i> Informations
              </h3>
              <div class="row text-center">
                <div class="col-md-4 mb-3">
                  <div style="padding: 20px; background: #f9f9f9; border-radius: 12px;">
                    <div style="font-size: 1.1rem; color: #667eea; font-weight: 700; margin-bottom: 8px;">
                      <i class="bi bi-tag"></i> Catégorie
                    </div>
                    <p style="color: #666; font-size: 0.95rem; margin: 0;">{{ $service->category }}</p>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div style="padding: 20px; background: #f9f9f9; border-radius: 12px;">
                    <div style="font-size: 1.1rem; color: #764ba2; font-weight: 700; margin-bottom: 8px;">
                      <i class="bi bi-calendar-event"></i> Date
                    </div>
                    <p style="color: #666; font-size: 0.95rem; margin: 0;">{{ $service->published_at ? $service->published_at->format('d F Y') : 'N/A' }}</p>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div style="padding: 20px; background: #f9f9f9; border-radius: 12px;">
                    <div style="font-size: 1.1rem; color: #667eea; font-weight: 700; margin-bottom: 8px;">
                      <i class="bi bi-clock"></i> Heure
                    </div>
                    <p style="color: #666; font-size: 0.95rem; margin: 0;">{{ $service->published_at ? $service->published_at->format('H:i') : 'N/A' }}</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Action Buttons Section -->
            <div style="padding-top: 20px; border-top: 2px solid #e0e0e0;">
              <div class="row gap-2 justify-content-center">
                <div class="col-auto">
                  <a href="{{ route('services.edit', $service->id) }}" class="btn btn-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; padding: 12px 30px; border-radius: 8px; font-weight: 600; transition: all 0.3s ease; box-shadow: 0 5px 20px rgba(102,126,234,0.3);">
                    <i class="bi bi-pencil-square"></i> Éditer ce service
                  </a>
                </div>
                <div class="col-auto">
                  <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-lg" style="background: #ff6b6b; color: white; border: none; padding: 12px 30px; border-radius: 8px; font-weight: 600; transition: all 0.3s ease; box-shadow: 0 5px 20px rgba(255,107,107,0.2);" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce service ? Cette action est irréversible.');">
                      <i class="bi bi-trash3"></i> Supprimer
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Related Services CTA Section -->
<section class="py-5" data-aos="fade-up">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 50px 40px; border-radius: 20px; color: white;">
          <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 15px;">
            <i class="bi bi-arrow-up-right"></i> Découvrez nos autres services
          </h2>
          <p style="font-size: 1.1rem; margin-bottom: 25px; opacity: 0.95;">
            Explorez notre gamme complète de services professionnels
          </p>
          <a href="{{ route('services.index') }}" class="btn btn-light btn-lg" style="padding: 12px 35px; font-weight: 600; border-radius: 8px;">
            Voir tous les services <i class="bi bi-arrow-right ms-2"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
