@extends('layouts.folio')

@section('title', 'Contact')

@section('body_class', 'contact-page')

@section('content')

<!-- Contact Section -->
<section id="contact" class="contact section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact</h2>
    <p>Vous avez une question ou souhaitez travailler ensemble ? N'hésitez pas à me contacter !</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-4 g-lg-5">
      <div class="col-lg-5">
        <div class="info-box" data-aos="fade-up" data-aos-delay="200">
          <h3>Contact Info</h3>
          

          <div class="info-item" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <i class="bi bi-geo-alt"></i>
            </div>
            <div class="content">
              <h4>My Location</h4>
              
            </div>
          </div>

          <div class="info-item" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box">
              <i class="bi bi-telephone"></i>
            </div>
            <div class="content">
              <h4>Phone Number</h4>
              <p></p>
            </div>
          </div>

          <div class="info-item" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <i class="bi bi-envelope"></i>
            </div>
            <div class="content">
              <h4>Email Address</h4>
              <p>info@example.com</p>
              <p>contact@example.com</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-7">
        <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
          <h3>Me Contacter</h3>
          <p></p>

          @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Erreur!</strong>
              <ul class="mb-0">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          <form action="{{ route('contact.store') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200" novalidate>
            @csrf
            <div class="row gy-4">

              <div class="col-md-6">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Your Name" value="{{ old('name') }}" required>
                @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="col-md-6 ">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                @error('email')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="col-12">
                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                @error('subject')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="col-12">
                <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="6" placeholder="Message" required>{{ old('message') }}</textarea>
                @error('message')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="col-12 text-center">
                <button type="submit" class="btn">Send Message</button>
              </div>

            </div>
          </form>

        </div>
      </div>

    </div>

  </div>

</section><!-- /Contact Section -->

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section" style="background:#01283b;">
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
          <div class="testimonial-item" style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); text-align: center; height: 100%;">
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

@endsection
