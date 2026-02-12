@extends('layouts.folio')

@section('title', 'Portfolio Details')

@section('body_class', 'portfolio-details-page')

@section('content')

<!-- Portfolio Details Section -->
<section id="portfolio-details" class="portfolio-details section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Portfolio Details</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row">

      <div class="col-lg-7">

        <!-- Portfolio Hero -->
        <div class="portfolio-hero" data-aos="fade-up" data-aos-delay="100">
          <div class="portfolio-meta">
            <span class="project-category">Strategy</span>
            <span class="project-year">2024</span>
          </div>
          <h1>Business Growth Strategy</h1>
          <p class="portfolio-description">Strategic consulting project to drive sustainable business growth through market analysis and innovation.</p>
        </div>

        <!-- Portfolio Visual -->
        <div class="portfolio-visual" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('folio/assets/img/portfolio/portfolio-1.webp') }}" alt="Portfolio Project" class="img-fluid">
        </div>

        <!-- Portfolio Content -->
        <div class="portfolio-narrative" data-aos="fade-up" data-aos-delay="300">
          <h3>Project Overview</h3>
          <p>Donec rutrum congue leo eget malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>

          <p>Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

          <!-- Key Metrics -->
          <div class="project-metrics" data-aos="fade-up" data-aos-delay="400">
            <div class="metric-card">
              <h4>45%</h4>
              <p>Revenue Growth</p>
            </div>
            <div class="metric-card">
              <h4>3 Markets</h4>
              <p>Expansion</p>
            </div>
            <div class="metric-card">
              <h4>120+</h4>
              <p>New Clients</p>
            </div>
            <div class="metric-card">
              <h4>6 Months</h4>
              <p>Timeline</p>
            </div>
          </div>

        </div>

      </div>

      <!-- Sidebar -->
      <div class="col-lg-5">
        <div class="portfolio-sidebar" data-aos="fade-left">
          <div class="sidebar-item">
            <h3>Project Info</h3>
            <ul class="project-details">
              <li><strong>Client:</strong> Fortune 500 Company</li>
              <li><strong>Category:</strong> Strategic Consulting</li>
              <li><strong>Year:</strong> 2024</li>
              <li><strong>Status:</strong> Completed</li>
            </ul>
          </div>

          <div class="sidebar-item">
            <h3>Technologies</h3>
            <ul class="tech-list">
              <li>Data Analytics</li>
              <li>Market Research</li>
              <li>Business Intelligence</li>
            </ul>
          </div>

          <div class="sidebar-item">
            <a href="{{ route('contact') }}" class="btn btn-primary w-100">Discuss Your Project</a>
          </div>
        </div>
      </div>

    </div>

  </div>

</section><!-- /Portfolio Details Section -->

@endsection
