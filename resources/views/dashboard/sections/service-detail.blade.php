<div class="content-section">
    <h2>
        <i class="bi bi-briefcase"></i>
        {{ $service->title }}
    </h2>
    
    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
        <div style="margin-bottom: 20px;">
            <strong style="color: #667eea;">Category:</strong>
            <span class="badge badge-primary" style="margin-left: 10px;">{{ $service->category ?? 'N/A' }}</span>
        </div>
        
        <div style="margin-bottom: 20px;">
            <strong style="color: #667eea;">Description:</strong>
            <p style="margin-top: 10px;">{{ $service->description }}</p>
        </div>
        
        <div style="margin-bottom: 20px;">
            <strong style="color: #667eea;">Status:</strong>
            @if($service->published_at)
                <span class="badge badge-success" style="margin-left: 10px;">Published</span>
                <small style="color: #888;">{{ $service->published_at->format('d M Y à H:i') }}</small>
            @else
                <span class="badge" style="margin-left: 10px; background: #ffc107; color: #333;">Draft</span>
            @endif
        </div>
        
        <div style="margin-bottom: 20px;">
            <strong style="color: #667eea;">Created:</strong>
            <small style="color: #888; margin-left: 10px;">{{ $service->created_at->format('d M Y à H:i') }}</small>
        </div>
    </div>
    
    <div class="action-buttons">
        <a href="{{ route('services.edit', $service->id) }}" class="action-btn action-btn-edit" style="text-decoration: none; display: inline-block;">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <a href="{{ route('services.index') }}" class="action-btn" style="background: #6c757d; color: white;">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>
