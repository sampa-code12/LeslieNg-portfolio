<!-- Testimonial Modal -->
<div class="modal fade" id="testimonialModal" tabindex="-1" aria-labelledby="testimonialModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="testimonialModalLabel">Donner un Témoignage</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('avis.store') }}" method="POST" id="testimonialForm">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">Votre Nom *</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Entrez votre nom" required value="{{ old('name') }}">
            @error('name')
              <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Votre Email *</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Entrez votre email" required value="{{ old('email') }}">
            @error('email')
              <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="message" class="form-label">Votre Témoignage *</label>
            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" placeholder="Partagez votre témoignage..." required>{{ old('message') }}</textarea>
            @error('message')
              <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
          </div>

          <small class="text-muted">Les champs marqués avec * sont obligatoires</small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Envoyer le Témoignage</button>
        </div>
      </form>
    </div>
  </div>
</div>
