<form method="POST" action="{{ route('avis.update', $testimonial->id) }}" class="edit-form">
    @csrf
    @method('PUT')
    
    <div class="form-group mb-3">
        <label for="author" class="form-label">Author Name</label>
        <input type="text" class="form-control" id="author" name="author" value="{{ $testimonial->author ?? '' }}" required>
    </div>

    <div class="form-group mb-3">
        <label for="email" class="form-label">Author Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $testimonial->email ?? '' }}">
    </div>

    <div class="form-group mb-3">
        <label for="company" class="form-label">Company</label>
        <input type="text" class="form-control" id="company" name="company" value="{{ $testimonial->company ?? '' }}">
    </div>

    <div class="form-group mb-3">
        <label for="message" class="form-label">Testimonial Message</label>
        <textarea class="form-control" id="message" name="message" rows="6" required>{{ $testimonial->message }}</textarea>
    </div>

    <div class="form-group mb-3">
        <label for="rating" class="form-label">Rating (1-5)</label>
        <select class="form-control" id="rating" name="rating">
            <option value="">Select rating</option>
            <option value="1" {{ $testimonial->rating == 1 ? 'selected' : '' }}>1 Star</option>
            <option value="2" {{ $testimonial->rating == 2 ? 'selected' : '' }}>2 Stars</option>
            <option value="3" {{ $testimonial->rating == 3 ? 'selected' : '' }}>3 Stars</option>
            <option value="4" {{ $testimonial->rating == 4 ? 'selected' : '' }}>4 Stars</option>
            <option value="5" {{ $testimonial->rating == 5 ? 'selected' : '' }}>5 Stars</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="published" name="published" value="1" {{ $testimonial->published_at ? 'checked' : '' }}>
            <label class="form-check-label" for="published">
                Publish this testimonial
            </label>
        </div>
    </div>

    <div class="action-buttons" style="justify-content: flex-end; gap: 10px;">
        <button type="submit" class="action-btn action-btn-edit" style="background: #28a745; color: white; cursor: pointer;">
            <i class="bi bi-check-circle"></i> Update
        </button>
        <button type="button" class="action-btn" style="background: #6c757d; color: white; cursor: pointer;" onclick="closeModal()">
            <i class="bi bi-x-circle"></i> Cancel
        </button>
    </div>
</form>

<style>
.form-control {
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-family: inherit;
    font-size: 0.95rem;
}

.form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    outline: none;
}

.form-label {
    font-weight: 600;
    margin-bottom: 8px;
    display: block;
    color: #2c3e50;
}

.form-group {
    margin-bottom: 20px;
}
</style>
