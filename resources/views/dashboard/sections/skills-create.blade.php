<div class="content-section">
    <h2>
        <i class="bi bi-plus-circle"></i>
        Create New Skill
    </h2>
    
    <form action="{{ route('skills.store') }}" method="POST" class="skill-form">
        @csrf
        
        <div class="form-group mb-3">
            <label for="name" class="form-label">Skill Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="category" required>
        </div>

        <div class="form-group mb-3">
            <label for="level" class="form-label">Proficiency Level</label>
            <select class="form-control" id="level" name="level" required>
                <option value="">Select a level</option>
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Advanced">Advanced</option>
                <option value="Expert">Expert</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="percentage" class="form-label">Proficiency Percentage (%)</label>
            <input type="number" class="form-control" id="percentage" name="percentage" min="0" max="100">
        </div>

        <div class="form-group mb-3">
            <label for="range" class="form-label">Progression Range</label>
            <select class="form-control" id="range" name="range">
                <option value="">Select range</option>
                <option value="Beginner">Beginner</option>
                <option value="Elementary">Elementary</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Advanced">Advanced</option>
                <option value="Expert">Expert</option>
                <option value="Master">Master</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="published" name="published" value="1">
                <label class="form-check-label" for="published">
                    Publish this skill
                </label>
            </div>
        </div>

        <div class="action-buttons">
            <button type="submit" class="action-btn action-btn-edit" style="background: #28a745; color: white; cursor: pointer;">
                <i class="bi bi-check-circle"></i> Create Skill
            </button>
            <button type="button" class="action-btn" style="background: #6c757d; color: white; cursor: pointer;" onclick="loadSection('skills-index'); return false;">
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
