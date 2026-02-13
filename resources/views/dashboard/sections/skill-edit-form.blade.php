<form method="POST" action="{{ route('skills.update', $skill->id) }}" class="edit-form">
    @csrf
    @method('PUT')
    
    <div class="form-group mb-3">
        <label for="name" class="form-label">Skill Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $skill->name }}" required>
    </div>

    <div class="form-group mb-3">
        <label for="category" class="form-label">Category</label>
        <input type="text" class="form-control" id="category" name="category" value="{{ $skill->category ?? '' }}" required>
    </div>

    <div class="form-group mb-3">
        <label for="level" class="form-label">Proficiency Level</label>
        <select class="form-control" id="level" name="level" required>
            <option value="Beginner" {{ $skill->level === 'Beginner' ? 'selected' : '' }}>Beginner</option>
            <option value="Intermediate" {{ $skill->level === 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
            <option value="Advanced" {{ $skill->level === 'Advanced' ? 'selected' : '' }}>Advanced</option>
            <option value="Expert" {{ $skill->level === 'Expert' ? 'selected' : '' }}>Expert</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="percentage" class="form-label">Proficiency Percentage (%)</label>
        <input type="number" class="form-control" id="percentage" name="percentage" min="0" max="100" value="{{ $skill->percentage ?? '' }}">
    </div>

    <div class="form-group mb-3">
        <label for="range" class="form-label">Progression Range</label>
        <select class="form-control" id="range" name="range">
            <option value="">Select range</option>
            <option value="Beginner" {{ $skill->range === 'Beginner' ? 'selected' : '' }}>Beginner</option>
            <option value="Elementary" {{ $skill->range === 'Elementary' ? 'selected' : '' }}>Elementary</option>
            <option value="Intermediate" {{ $skill->range === 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
            <option value="Advanced" {{ $skill->range === 'Advanced' ? 'selected' : '' }}>Advanced</option>
            <option value="Expert" {{ $skill->range === 'Expert' ? 'selected' : '' }}>Expert</option>
            <option value="Master" {{ $skill->range === 'Master' ? 'selected' : '' }}>Master</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="published" name="published" value="1" {{ $skill->published_at ? 'checked' : '' }}>
            <label class="form-check-label" for="published">
                Publish this skill
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
