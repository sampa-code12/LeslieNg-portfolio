<div class="content-section">
    <h2>
        <i class="bi bi-plus-circle"></i>
        Create New Testimonial
    </h2>
    
    <form action="{{ route('avis.store') }}" method="POST" class="testimonial-form">
        @csrf
        
        <div class="form-group mb-3">
            <label for="author" class="form-label">Author Name</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>

        <div class="form-group mb-3">
            <label for="email" class="form-label">Author Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group mb-3">
            <label for="company" class="form-label">Company</label>
            <input type="text" class="form-control" id="company" name="company">
        </div>

        <div class="form-group mb-3">
            <label for="message" class="form-label">Testimonial Message</label>
            <textarea class="form-control" id="message" name="message" rows="6" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="rating" class="form-label">Rating (1-5)</label>
            <select class="form-control" id="rating" name="rating">
                <option value="">Select rating</option>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="published" name="published" value="1">
                <label class="form-check-label" for="published">
                    Publish this testimonial
                </label>
            </div>
        </div>

        <div class="action-buttons">
            <button type="submit" class="action-btn action-btn-edit" style="background: #28a745; color: white; cursor: pointer;">
                <i class="bi bi-check-circle"></i> Create Testimonial
            </button>
            <button type="button" class="action-btn" style="background: #6c757d; color: white; cursor: pointer;" onclick="loadSection('testimonials-index'); return false;">
                <i class="bi bi-x-circle"></i> Cancel
            </button>
        </div>
    </form>
</div>

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
