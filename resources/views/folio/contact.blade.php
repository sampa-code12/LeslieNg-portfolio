@extends('layouts.folio')

@section('title', 'Contact')

@section('body_class', 'contact-page')

@section('content')

<!-- Contact Section -->
<section id="contact" class="contact section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-4 g-lg-5">
      <div class="col-lg-5">
        <div class="info-box" data-aos="fade-up" data-aos-delay="200">
          <h3>Contact Info</h3>
          <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis.</p>

          <div class="info-item" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <i class="bi bi-geo-alt"></i>
            </div>
            <div class="content">
              <h4>Our Location</h4>
              <p>A108 Adam Street</p>
              <p>New York, NY 535022</p>
            </div>
          </div>

          <div class="info-item" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box">
              <i class="bi bi-telephone"></i>
            </div>
            <div class="content">
              <h4>Phone Number</h4>
              <p>+1 5589 55488 55</p>
              <p>+1 6678 254445 41</p>
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
          <h3>Get In Touch</h3>
          <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis.</p>

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

@endsection
