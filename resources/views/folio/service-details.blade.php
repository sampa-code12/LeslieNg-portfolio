@extends('layouts.folio')

@section('title', 'Service Details')

@section('body_class', 'service-details-page')

@section('content')

<!-- Service Details Section -->
<section id="service-details" class="service-details section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Service Details</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row">

      <!-- Main Content Area -->
      <div class="col-lg-7">

        <!-- Hero Service Introduction -->
        <div class="service-hero" data-aos="fade-up" data-aos-delay="100">
          <div class="service-meta">
            <span class="service-category">Strategic Consulting</span>
            <span class="reading-time">5 min read</span>
          </div>
          <h1>Business Process Optimization</h1>
          <p class="service-description">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae mauris viverra.</p>
        </div>

        <!-- Service Visual -->
        <div class="service-visual" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('folio/assets/img/services/services-7.webp') }}" alt="Business Process Optimization" class="img-fluid">
        </div>

        <!-- Service Content -->
        <div class="service-narrative" data-aos="fade-up" data-aos-delay="300">
          <h3>Transform Your Operations</h3>
          <p>Donec rutrum congue leo eget malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum porta.</p>

          <p>Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec sollicitudin molestie malesuada.</p>

          <!-- Key Benefits Grid -->
          <div class="benefits-grid" data-aos="fade-up" data-aos-delay="400">
            <div class="benefit-card">
              <div class="benefit-icon">
                <i class="bi bi-lightning-charge"></i>
              </div>
              <h4>Efficiency Boost</h4>
              <p>Curabitur arcu erat accumsan id imperdiet et porttitor at sem.</p>
            </div>

            <div class="benefit-card">
              <div class="benefit-icon">
                <i class="bi bi-shield-check"></i>
              </div>
              <h4>Risk Mitigation</h4>
              <p>Pellentesque in ipsum id orci porta dapibus vestibulum ante ipsum.</p>
            </div>

            <div class="benefit-card">
              <div class="benefit-icon">
                <i class="bi bi-graph-up"></i>
              </div>
              <h4>Growth Acceleration</h4>
              <p>Vivamus suscipit tortor eget felis porttitor volutpat mauris blandit.</p>
            </div>

            <div class="benefit-card">
              <div class="benefit-icon">
                <i class="bi bi-people"></i>
              </div>
              <h4>Team Alignment</h4>
              <p>Donec rutrum congue leo eget malesuada vivamus magna justo lacinia.</p>
            </div>
          </div>

        </div>

      </div>

      <!-- Sidebar -->
      <div class="col-lg-5">
        <div class="service-sidebar" data-aos="fade-left">
          <div class="sidebar-item">
            <h3>Service Info</h3>
            <ul class="service-list">
              <li><strong>Category:</strong> Strategic Consulting</li>
              <li><strong>Duration:</strong> 12 weeks</li>
              <li><strong>Availability:</strong> Immediate</li>
            </ul>
          </div>

          <div class="sidebar-item">
            <h3>Related Services</h3>
            <ul class="service-links">
              <li><a href="{{ route('service-details') }}">Digital Transformation</a></li>
              <li><a href="{{ route('service-details') }}">Process Automation</a></li>
              <li><a href="{{ route('service-details') }}">Change Management</a></li>
            </ul>
          </div>

          <div class="sidebar-item">
            <a href="{{ route('contact') }}" class="btn btn-primary w-100">Get Started</a>
          </div>
        </div>
      </div>

    </div>

  </div>

</section><!-- /Service Details Section -->

@endsection
