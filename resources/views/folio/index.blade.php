@extends('layouts.folio')

@section('title', 'Home')

@section('body_class', 'index-page')

@section('content')

<!-- Hero Section -->
<section id="hero" class="hero section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4 align-items-center">
      <div class="col-lg-6 order-2 order-lg-1">
        <div class="hero-content">
          <h1 data-aos="fade-up" data-aos-delay="200">Hello, I'm <span class="highlight">Leslie NG</span></h1>
          <h2 data-aos="fade-up" data-aos-delay="300">Creative <span class="typed" data-typed-items="Graphic Designer"></span></h2>
          <p data-aos="fade-up" data-aos-delay="400">I transform ideas into stunning digital experiences. Specializing in user-centered design, visual branding, and interactive interfaces that captivate and convert.</p>
          <div class="hero-actions" data-aos="fade-up" data-aos-delay="500">
            <a href="{{ route('portfolio') }}" class="btn btn-primary">View My Work</a>
            <a href="{{ route('contact') }}" class="btn btn-outline">Get In Touch</a>
          </div>
          <div class="social-links" data-aos="fade-up" data-aos-delay="600">
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
            <a href="#"><i class="bi bi-github"></i></a>
            <a href="#"><i class="bi bi-dribbble"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2">
        <div class="hero-image" data-aos="zoom-in" data-aos-delay="300">
          <div class="image-wrapper">
            <img src="{{ asset('folio/assets/img/profile/LeslieNg.jpeg') }}" alt="Sarah Mitchell" class="img-fluid">
            <div class="floating-elements">
              <div class="floating-card design" data-aos="fade-left" data-aos-delay="700">
                <i class="bi bi-palette"></i>
                <span>Design</span>
              </div>
              <div class="floating-card code" data-aos="fade-right" data-aos-delay="800">
                <i class="bi bi-pencil"></i>
                <span>Photoshop</span>
              </div>
              <div class="floating-card creativity" data-aos="fade-up" data-aos-delay="900">
                <i class="bi bi-lightbulb"></i>
                <span>Ideas</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</section><!-- /Hero Section -->

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

    <!-- Key Skills/Expertise -->
    <div class="row g-4 mt-5">
      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="120">
        <div class="skill-item" style="text-align: center; padding: 25px; background: #f9f9f9; border-radius: 12px; border-left: 4px solid #667eea;">
          <i class="bi bi-palette" style="font-size: 2.5rem; color: #667eea;"></i>
          <h4 style="margin: 15px 0; color: #333; font-weight: 700;">Design Créatif</h4>
          <p style="color: #666; font-size: 0.95rem;">Création visuelle et branding</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="180">
        <div class="skill-item" style="text-align: center; padding: 25px; background: #f9f9f9; border-radius: 12px; border-left: 4px solid #764ba2;">
          <i class="bi bi-lightbulb" style="font-size: 2.5rem; color: #764ba2;"></i>
          <h4 style="margin: 15px 0; color: #333; font-weight: 700;">Stratégie UX</h4>
          <p style="color: #666; font-size: 0.95rem;">Conception centrée utilisateur</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="240">
        <div class="skill-item" style="text-align: center; padding: 25px; background: #f9f9f9; border-radius: 12px; border-left: 4px solid #667eea;">
          <i class="bi bi-pen" style="font-size: 2.5rem; color: #667eea;"></i>
          <h4 style="margin: 15px 0; color: #333; font-weight: 700;">Branding</h4>
          <p style="color: #666; font-size: 0.95rem;">Identité visuelle complète</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
        <div class="skill-item" style="text-align: center; padding: 25px; background: #f9f9f9; border-radius: 12px; border-left: 4px solid #764ba2;">
          <i class="bi bi-display" style="font-size: 2.5rem; color: #764ba2;"></i>
          <h4 style="margin: 15px 0; color: #333; font-weight: 700;">Digital</h4>
          <p style="color: #666; font-size: 0.95rem;">Solutions web modernes</p>
        </div>
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
            <!-- Color bar -->
            <div style="height: 5px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"></div>
            
            <div class="card-body p-4">
              <!-- Icon -->
              <div class="mb-3" style="font-size: 2.5rem; color: #667eea;">
                <i class="bi bi-briefcase"></i>
              </div>
              
              <!-- Title -->
              <h5 class="card-title" style="font-weight: 700; font-size: 1.3rem; color: #333; margin-bottom: 15px;">{{ $service->title }}</h5>
              
              <!-- Category Badge -->
              <p class="mb-3">
                <span class="badge" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">{{ $service->category }}</span>
              </p>
              
              <!-- Description -->
              <p class="card-text" style="color: #666; line-height: 1.6; font-size: 0.95rem;">{{ $service->description }}</p>
              
              <!-- Date -->
              <small class="text-muted d-block mb-3">
                <i class="bi bi-calendar3"></i> {{ $service->published_at ? $service->published_at->format('d M Y') : 'N/A' }}
              </small>
              
              <!-- Action Button -->
              
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
          <div class="skill-item">
            <div class="skill-icon">
              <i class="bi bi-star-fill"></i>
            </div>
            <h3>{{ $skill->name }}</h3>
            <p>
              <span class="badge" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                {{ $skill->category }}
              </span>
            </p>
            @if($skill->level)
              <div class="skill-level">
                <small style="color: #667eea; font-weight: 600;">{{ $skill->level }}</small>
              </div>
            @endif
          </div>
        </div>
      @empty
        <div class="col-12 text-center">
          <p>Pas de compétences disponibles</p>
        </div>
      @endforelse
    </div>
  </div>
</section>


<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section" style="background: #01283b;">
  <div class="container section-title" data-aos="fade-up">
    <h2>Témoignages</h2>
    <p>Ce que mes clients disent de mon travail</p>
    <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#testimonialModal" style="margin-top: 15px;">
      <i class="bi bi-star"></i> Donner un Témoignage
    </button>
  </div>

  <div class="container">
    <div class="row gy-4">
      @forelse($avis as $avi)
        <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
          <div class="testimonial-item" style="background: var(--default-color, #e7f2f7); padding: 30px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); text-align: center; height: 100%;">
            <div class="stars mb-3" style="color: #ffc107; font-size: 1.2rem;">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
            <p class="testimonial-text mb-3" style="color: #666; line-height: 1.6; min-height: 100px; display: flex; align-items: center; justify-content: center;">
              "{{ $avi->message }}"
            </p>
            <div class="testimonial-author">
              <h5 style="margin-bottom: 5px; color: #333;">{{ $avi->name ?? 'Utilisateur' }}</h5>
              @if($avi->email)
                <p style="color: #999; margin-bottom: 5px; font-size: 0.9rem;">{{ $avi->email }}</p>
              @endif
              <small style="color: #999;">
                <i class="bi bi-calendar3"></i> {{ $avi->created_at->format('d M Y') }}
              </small>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center">
          <p style="color: #666; padding: 30px;">Aucun témoignage pour le moment. Soyez le premier à en laisser un !</p>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testimonialModal">
            <i class="bi bi-star"></i> Donner le Premier Témoignage
          </button>
        </div>
      @endforelse
    </div>
  </div>
</section><!-- /Testimonials Section -->

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

@endsection
