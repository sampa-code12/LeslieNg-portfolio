<div class="content-section">
    <h2>
        <i class="bi bi-star"></i>
        All Skills
    </h2>
    
    @if($skills->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Level</th>
                    <th>Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($skills as $skill)
                    <tr>
                        <td><strong>{{ $skill->name }}</strong></td>
                        <td>{{ $skill->category ?? 'General' }}</td>
                        <td><span class="badge badge-success">{{ $skill->level ?? 'Intermediate' }}</span></td>
                        <td>{{ $skill->published_at ? $skill->published_at->format('d M Y') : 'Not Published' }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('skills.edit', $skill->id) }}" class="action-btn action-btn-edit">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn action-btn-delete" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        @if($skills->hasPages())
            <nav class="d-flex justify-content-center mt-4">
                {{ $skills->links() }}
            </nav>
        @endif
    @else
        <div class="empty-state">
            <i class="bi bi-inbox"></i>
            <p>No skills yet. <a href="{{ route('skills.create') }}">Create one</a></p>
        </div>
    @endif
</div>
