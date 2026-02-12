@extends('layouts.folio')

@section('title', 'Competences')

@section('content')

<!-- Hero Section -->
<section style="margin-top: 100px; padding: 60px 0; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h1 data-aos="fade-up" style="font-size: 3rem; margin-bottom: 20px;">Mes Competences</h1>
        <p data-aos="fade-up" data-aos-delay="100" style="font-size: 1.1rem;">Explorez mes domaines d'expertise professionnels</p>
      </div>
      <div class="col-lg-4 text-end" data-aos="fade-left" data-aos-delay="200">
        <a href="{{ route('skills.create') }}" class="btn btn-light btn-lg"><i class="bi bi-plus-circle"></i> Ajouter Comp.</a>
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

<!-- Skills Grid -->
<section class="py-5">
  <div class="container">
    <div class="row">
      @forelse($skill as $item)
        <div class="col-lg-4 col-md-6 mb-4" data-aos="flip-left" data-aos-delay="{{ $loop->index * 100 }}">
          <div class="card skill-card h-100" style="border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.1); border-radius: 15px; transition: all 0.3s ease; overflow: hidden;">
            <div style="height: 5px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"></div>
            <div class="card-body p-4">
              <div class="mb-3" style="font-size: 2.5rem; color: #667eea;">
                <i class="bi bi-gear"></i>
              </div>
              <h5 class="card-title" style="font-weight: 700; font-size: 1.3rem; color: #333;">{{ $item->name }}</h5>
              <p class="mb-3">
                <span class="badge" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">{{ $item->category }}</span>
              </p>
              @if($item->level)
                <div class="mb-3">
                  <small class="d-inline-block px-3 py-2 rounded" style="background: #f0f0f0; color: #667eea; font-weight: 600;">
                    <i class="bi bi-award"></i> {{ $item->level }}
                  </small>
                </div>
              @endif
              <small class="text-muted d-block mb-3">
                <i class="bi bi-calendar3"></i> {{ $item->published_at->format('d M Y') }}
              </small>
              <div class="btn-group w-100" role="group">
                <a href="{{ route('skills.show', $item->id) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></a>
                <a href="{{ route('skills.edit', $item->id) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a>
                <form action="{{ route('skills.destroy', $item->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Confirmation?')"><i class="bi bi-trash"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-5">
          <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
          <p class="text-muted mt-3" style="font-size: 1.1rem;">Aucune competence trouvee.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>

@endsection
