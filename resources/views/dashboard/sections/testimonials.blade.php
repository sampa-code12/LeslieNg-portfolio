<div class="content-section">
    <h2>
        <i class="bi bi-chat-left-quote"></i>
        All Testimonials
    </h2>
    
    @if($testimonials->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Author</th>
                    <th>Message</th>
                    <th>Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonials as $testimonial)
                    <tr>
                        <td><strong>{{ $testimonial->author ?? 'Anonymous' }}</strong></td>
                        <td>{{ Str::limit($testimonial->message, 50) }}</td>
                        <td>{{ $testimonial->published_at ? $testimonial->published_at->format('d M Y') : 'Not Published' }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('avis.show', $testimonial->id) }}" class="action-btn action-btn-edit">
                                    <i class="bi bi-eye"></i> View
                                </a>
                                <a href="{{ route('avis.edit', $testimonial->id) }}" class="action-btn action-btn-edit">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('avis.destroy', $testimonial->id) }}" method="POST" style="display:inline;">
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
        @if($testimonials->hasPages())
            <nav class="d-flex justify-content-center mt-4">
                {{ $testimonials->links() }}
            </nav>
        @endif
    @else
        <div class="empty-state">
            <i class="bi bi-inbox"></i>
            <p>No testimonials yet.</p>
        </div>
    @endif
</div>
