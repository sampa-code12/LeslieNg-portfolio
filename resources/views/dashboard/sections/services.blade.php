<?php
// Debug view pour les services
?>

<div class="content-section">
    <h2>
        <i class="bi bi-briefcase"></i>
        All Services
    </h2>
    
    @if($services->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                    <tr>
                        <td><strong>{{ $service->title }}</strong></td>
                        <td><span class="badge badge-primary">{{ $service->category ?? 'N/A' }}</span></td>
                        <td>{{ $service->published_at ? $service->published_at->format('d M Y') : 'Not Published' }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('services.show', $service->id) }}" class="action-btn action-btn-edit">
                                    <i class="bi bi-eye"></i> View
                                </a>
                                <a href="{{ route('services.edit', $service->id) }}" class="action-btn action-btn-edit">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
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
        @if($services->hasPages())
            <nav class="d-flex justify-content-center mt-4">
                {{ $services->links() }}
            </nav>
        @endif
    @else
        <div class="empty-state">
            <i class="bi bi-inbox"></i>
            <p>No services yet. <a href="{{ route('services.create') }}">Create one</a></p>
        </div>
    @endif
</div>
