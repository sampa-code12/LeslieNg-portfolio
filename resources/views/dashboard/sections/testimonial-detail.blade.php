<div class="content-section">
    <h2>
        <i class="bi bi-chat-left-quote"></i>
        Testimonial from {{ $testimonial->author ?? 'Anonymous' }}
    </h2>
    
    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
        <div style="margin-bottom: 20px;">
            <strong style="color: #667eea;">Author:</strong>
            <span style="margin-left: 10px;">{{ $testimonial->author ?? 'Anonymous' }}</span>
        </div>
        
        @if($testimonial->email)
        <div style="margin-bottom: 20px;">
            <strong style="color: #667eea;">Email:</strong>
            <a href="mailto:{{ $testimonial->email }}" style="margin-left: 10px;">{{ $testimonial->email }}</a>
        </div>
        @endif
        
        @if($testimonial->company)
        <div style="margin-bottom: 20px;">
            <strong style="color: #667eea;">Company:</strong>
            <span style="margin-left: 10px;">{{ $testimonial->company }}</span>
        </div>
        @endif
        
        <div style="margin-bottom: 20px;">
            <strong style="color: #667eea;">Message:</strong>
            <p style="margin-top: 10px; font-style: italic; border-left: 4px solid #667eea; padding-left: 15px;">{{ $testimonial->message }}</p>
        </div>
        
        @if($testimonial->rating)
        <div style="margin-bottom: 20px;">
            <strong style="color: #667eea;">Rating:</strong>
            <div style="margin-left: 10px; color: #f093fb; font-size: 1.2rem;">
                @for($i = 0; $i < $testimonial->rating; $i++)
                    <i class="bi bi-star-fill"></i>
                @endfor
                @for($i = $testimonial->rating; $i < 5; $i++)
                    <i class="bi bi-star"></i>
                @endfor
            </div>
        </div>
        @endif
        
        <div style="margin-bottom: 20px;">
            <strong style="color: #667eea;">Status:</strong>
            @if($testimonial->published_at)
                <span class="badge badge-success" style="margin-left: 10px;">Published</span>
                <small style="color: #888;">{{ $testimonial->published_at->format('d M Y à H:i') }}</small>
            @else
                <span class="badge" style="margin-left: 10px; background: #ffc107; color: #333;">Draft</span>
            @endif
        </div>
        
        <div style="margin-bottom: 20px;">
            <strong style="color: #667eea;">Created:</strong>
            <small style="color: #888; margin-left: 10px;">{{ $testimonial->created_at->format('d M Y à H:i') }}</small>
        </div>
    </div>
    
    <div class="action-buttons">
        <a href="{{ route('avis.edit', $testimonial->id) }}" class="action-btn action-btn-edit" style="text-decoration: none; display: inline-block;">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <a href="{{ route('avis.index') }}" class="action-btn" style="background: #6c757d; color: white;">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>

<script>
// Aucun listener nécessaire - liens directs vers les pages d'édition
</script>
