<div class="content-section">
    <h2>
        <i class="bi bi-plus-circle"></i>
        Create New Service
    </h2>
    
    <form action="{{ route('services.store') }}" method="POST" class="service-form">
        @csrf
        
        <div class="form-group mb-3">
            <label for="title" class="form-label">Service Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="category" required>
        </div>

        <div class="form-group mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="published" name="published" value="1">
                <label class="form-check-label" for="published">
                    Publish this service
                </label>
            </div>
        </div>

        <div class="action-buttons">
            <button type="submit" class="action-btn action-btn-edit" style="background: #28a745; color: white; cursor: pointer;">
                <i class="bi bi-check-circle"></i> Create Service
            </button>
            <button type="button" class="action-btn" style="background: #6c757d; color: white; cursor: pointer;" onclick="loadSection('services-index'); return false;">
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
