@extends('layouts.folio')

@section('title', @yield('title', 'Admin'))

@section('content')

<!-- Page Title Section -->
<section class="page-title-section py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; margin-top: 100px;">
  <div class="container">
    <h1 data-aos="fade-up">@yield('page_title', 'Dashboard')</h1>
    <p data-aos="fade-up" data-aos-delay="100">@yield('page_subtitle', '')</p>
  </div>
</section>

<!-- Main Content -->
<section class="py-5">
  <div class="container">
    @yield('content_inner')
  </div>
</section>

@endsection
