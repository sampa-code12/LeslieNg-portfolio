''@extends('layouts.folio')

@section('title', 'About')

@section('body_class', 'about-page')

@section('content')

<!-- About Section -->
<section id="about" class="about section">
  <div class="container section-title" data-aos="fade-up">
    <h2>About</h2>
    <p>En savoir plus sur moi et mon approche créative du design</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row align-items-center justify-content-between gy-5">
      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="150">
        <div class="intro-content">
          <h3 style="font-size: 2rem; font-weight: 700; color: #333; margin-bottom: 20px;">Je suis Leslie Yasmine</h3>
          <p style="font-size: 1.05rem; line-height: 1.8; color: #555; margin-bottom: 15px;">
            Je suis une designer créative passionnée par la création d'expériences visuelles captivantes et 
            intuitives. Avec une expertise en UI/UX design, branding digital et stratégie créative, je transforme 
            les idées complexes en solutions de design élégantes et efficaces.
          </p>
          <p style="font-size: 1.05rem; line-height: 1.8; color: #555; margin-bottom: 20px;">
            Mon approche combine rigueur analytique et sensibilité créative pour livrer des designs qui 
            non seulement sont beaux, mais qui résolvent aussi des problèmes réels et créent de l'impact.
          </p>
          <div style="display: flex; gap: 15px; margin-top: 25px;">
            <a href="{{ route('about') }}" class="btn btn-primary" style="padding: 12px 30px;">
              <i class="bi bi-arrow-right"></i> En savoir plus
            </a>
            <a href="{{ route('portfolio') }}" class="btn btn-outline" style="padding: 12px 30px;">
              Voir mon portfolio
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-5" data-aos="zoom-in" data-aos-delay="250">
        <figure class="profile-figure text-center">
          <img src="{{ asset('folio/assets/img/profile/LeslieNg.jpeg') }}" alt="Leslie Yasmine" class="img-fluid" style="border-radius: 15px; box-shadow: 0 15px 50px rgba(0,0,0,0.15);">
        </figure>
      </div>
    </div>

    </div>
</section><!-- /About Section -->

<!-- Services Section -->
<section id="services" class="services section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Services</h2>
    <p>Découvrez les services professionnels que j'offre pour transformer vos idées en réalité</p>
  </div>

  <div class="container">
    <div class="row gy-4">
      @forelse($services as $service)
        <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
          <div class="card service-card h-100" style="border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.1); border-radius: 15px; transition: all 0.3s ease; overflow: hidden;">
            <div style="height: 5px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"></div>
            <div class="card-body p-4">
              <div class="mb-3" style="font-size: 2.5rem; color: #667eea;">
                <i class="bi bi-briefcase"></i>
              </div>
              <h5 class="card-title" style="font-weight: 700; font-size: 1.3rem; color: #333; margin-bottom: 15px;">{{ $service->title }}</h5>
              <p class="mb-3">
                <span class="badge" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">{{ $service->category }}</span>
              </p>
              <p class="card-text" style="color: #666; line-height: 1.6; font-size: 0.95rem;">{{ $service->description }}</p>
              <small class="text-muted d-block mb-3">
                <i class="bi bi-calendar3"></i> {{ $service->published_at ? $service->published_at->format('d M Y') : 'N/A' }}
              </small>
              <div class="btn-group w-100" role="group">
                <a href="{{ route('services.show', $service->id) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> Détails</a>
              </div>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center">
          <p style="color: #666; padding: 20px;">Pas de services disponibles</p>
        </div>
      @endforelse
    </div>
  </div>
</section>

<!-- Skills Section -->
<section id="skills" class="skills section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Compétences</h2>
    <p>Mes domaines d'expertise professionnels</p>
  </div>

  <div class="container">
    <div class="row gy-4">
      @forelse($skills as $skill)
        <div class="col-lg-4 col-md-6" data-aos="flip-left" data-aos-delay="{{ $loop->index * 100 }}">
          <div class="card skill-card h-100" style="border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.1); border-radius: 15px; transition: all 0.3s ease; overflow: hidden;">
            <div style="height: 5px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"></div>
            <div class="card-body p-4">
              <div class="mb-3" style="font-size: 2.5rem; color: #667eea;">
                <i class="bi bi-star-fill"></i>
              </div>
              <h5 class="card-title" style="font-weight: 700; font-size: 1.3rem; color: #333;">{{ $skill->name }}</h5>
              <p class="mb-3">
                <span class="badge" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">{{ $skill->category }}</span>
              </p>
              @if($skill->level)
                <div class="skill-level">
                  <small style="color: #667eea; font-weight: 600;">{{ $skill->level }}</small>
                </div>
              @endif
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center">
          <p style="color: #666; padding: 20px;">Pas de compétences disponibles</p>
        </div>
      @endforelse
    </div>
  </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact</h2>
    <p>Vous avez un projet ? Contactez-moi directement</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4 g-lg-5">
      <div class="col-lg-5">
        <div class="info-box" data-aos="fade-up" data-aos-delay="200">
          <h3>Informations de Contact</h3>
          <p>N'hésitez pas à me contacter pour discuter de vos projets</p>

          <div class="info-item" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <i class="bi bi-envelope"></i>
            </div>
            <div class="content">
              <h4>Email</h4>
              <p>leslie.ng@example.com</p>
            </div>
          </div>

          <div class="info-item" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box">
              <i class="bi bi-telephone"></i>
            </div>
            <div class="content">
              <h4>Téléphone</h4>
              <p>+33 6 XX XX XX XX</p>
            </div>
          </div>

          <div class="info-item" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <i class="bi bi-geo-alt"></i>
            </div>
            <div class="content">
              <h4>Localisation</h4>
              <p>France</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-7">
        <form action="{{ route('contact.store') }}" method="POST" class="php-email-form" data-aos="fade-up" data-aos-delay="300">
          @csrf
          
          <div class="row gy-4">
            <div class="col-md-6">
              <label for="name" class="form-label">Votre Nom</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required placeholder="Votre nom" value="{{ old('name') }}">
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label for="email" class="form-label">Votre Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required placeholder="Votre email" value="{{ old('email') }}">
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-12">
              <label for="subject" class="form-label">Sujet</label>
              <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" required placeholder="Sujet du message" value="{{ old('subject') }}">
              @error('subject')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-12">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" rows="6" required placeholder="Votre message...">{{ old('message') }}</textarea>
              @error('message')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-primary btn-lg">
                <i class="bi bi-send"></i> Envoyer le Message
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials/Avis Section -->
<section id="testimonials" class="testimonials section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Avis & Témoignages</h2>
    <p>Découvrez ce que mes clients pensent de mes services</p>
  </div>

  <div class="container">
    @if($avis->count() > 0)
      <div class="row gy-4">
        @forelse($avis as $item)
          <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
            <div class="card testimonial-card h-100" style="border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.1); border-radius: 15px; transition: all 0.3s ease;">
              <div class="card-body p-4">
                <!-- Stars -->
                <div class="mb-3">
                  <div style="color: #ffc107; font-size: 1.2rem;">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                </div>
                
                <!-- Message -->
                <p class="card-text" style="color: #666; line-height: 1.8; font-style: italic; margin-bottom: 20px;">
                  "{{ $item->message }}"
                </p>
                
                <!-- Author Info -->
                <div style="padding-top: 15px; border-top: 1px solid #e0e0e0;">
                  <div style="display: flex; align-items: center; gap: 10px;">
                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 1.2rem;">
                      {{ substr($item->message, 0, 1) }}
                    </div>
                    <div>
                      <p style="color: #333; font-weight: 700; margin: 0;">Client Satisfait</p>
                      <small style="color: #999;">{{ $item->published_at ? $item->published_at->format('d M Y') : 'N/A' }}</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12 text-center">
            <p style="color: #666; padding: 20px;">Pas d'avis disponibles pour le moment</p>
          </div>
        @endforelse
      </div>
    @else
      <div class="row">
        <div class="col-12 text-center">
          <p style="color: #666; padding: 30px; font-size: 1.05rem;">
            <i class="bi bi-info-circle" style="color: #667eea;"></i> Aucun avis disponible pour le moment
          </p>
        </div>
      </div>
    @endif
  </div>
</section>

@endsection
