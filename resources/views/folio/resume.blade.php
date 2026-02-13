@extends('layouts.folio')

@section('title', 'Resume')

@section('body_class', 'resume-page')

@section('content')

<!-- Resume Section -->
<section id="resume" class="resume section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Resume</h2>
    <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#testimonialModal" style="margin-top: 15px;">
      <i class="bi bi-star"></i> Donner un Témoignage
    </button>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row">
      <div class="col-lg-6">

        <!-- Education Section -->
        <div class="resume-item" data-aos="fade-up">
          <h3 class="resume-title">Education</h3>

          <div class="resume-content">
            @forelse($educations as $edu)
              <article class="education-item">
                <h4>{{ $edu->title }}</h4>
                @if($edu->start_date && $edu->end_date)
                  <h5>{{ $edu->start_date->year }} - {{ $edu->end_date->year }}</h5>
                @else
                  <h5>{{ $edu->subtitle }}</h5>
                @endif
                @if($edu->institution_company)
                  <p class="institution"><em>{{ $edu->institution_company }}</em></p>
                @endif
                @if($edu->description)
                  <p>{{ $edu->description }}</p>
                @endif
              </article>
            @empty
              <p>Aucune formation disponible</p>
            @endforelse
          </div>
        </div><!-- End Education Section -->

        <!-- Professional Skills Section -->
        <div class="resume-item skills-animation" data-aos="fade-up">
          <h3 class="resume-title">Professional Skills</h3>

          <div class="resume-content">
            @forelse($skills as $skill)
              <div class="skill-item">
                <h4>{{ $skill->title }}</h4>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->percentage ?? 0 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill->percentage ?? 0 }}%"></div>
                </div>
              </div>
            @empty
              <p>Aucune compétence disponible</p>
            @endforelse
          </div>
        </div><!-- End Professional Skills Section -->
      </div>

      <div class="col-lg-6">
        <!-- Experience Section -->
        <div class="resume-item" data-aos="fade-up" data-aos-delay="100">
          <h3 class="resume-title">Professional Experience</h3>

          <div class="resume-content">
            @forelse($experiences as $exp)
              <article class="experience-item">
                <h4>{{ $exp->title }}</h4>
                @if($exp->start_date && $exp->end_date)
                  <h5>{{ $exp->start_date->year }} - {{ $exp->end_date->year }}</h5>
                @else
                  <h5>{{ $exp->subtitle }}</h5>
                @endif
                @if($exp->institution_company)
                  <p class="company"><em>{{ $exp->institution_company }}</em></p>
                @endif
                @if($exp->description)
                  <p>{{ $exp->description }}</p>
                @endif
              </article>
            @empty
              <p>Aucune expérience disponible</p>
            @endforelse
          </div>
        </div><!-- End Experience Section -->
      </div>
    </div>

  </div>

</section><!-- /Resume Section -->

@endsection
