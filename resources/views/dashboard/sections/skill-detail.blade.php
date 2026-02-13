<div class="content-section">
    <h2>
        <i class="bi bi-star"></i>
        {{ $skill->name }}
    </h2>
    
    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
        @if($skill->category)
        <div style="margin-bottom: 20px;">
            <strong style="color: #667eea;">Category:</strong>
            <span style="margin-left: 10px;">{{ $skill->category }}</span>
        </div>
        @endif
        
        <div style="margin-bottom: 20px;">
            <strong style="color: #667eea;">Proficiency Level:</strong>
            <span class="badge badge-success" style="margin-left: 10px;">{{ $skill->level ?? 'Intermediate' }}</span>
        </div>
        
        @if($skill->percentage)
        <div style="margin-bottom: 20px;">
            <strong style="color: #667eea;">Percentage:</strong>
            <div style="margin-top: 10px; background: #e9ecef; border-radius: 8px; height: 20px; overflow: hidden;">
                <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); width: {{ $skill->percentage }}%; height: 100%; display: flex; align-items: center; justify-content: center; color: white; font-size: 0.7rem; font-weight: 700;">
                    {{ $skill->percentage }}%
                </div>
            </div>
        </div>
        @endif
        
        @if($skill->range)
        <div style="margin-bottom: 20px;">
            <strong style="color: #667eea;">Progression Range:</strong>
            <span class="badge" style="margin-left: 10px; background: #667eea; color: white;">{{ $skill->range }}</span>
        </div>
        @endif
        
        <div style="margin-bottom: 20px;">
            <strong style="color: #667eea;">Status:</strong>
            @if($skill->published_at)
                <span class="badge badge-success" style="margin-left: 10px;">Published</span>
                <small style="color: #888;">{{ $skill->published_at->format('d M Y à H:i') }}</small>
            @else
                <span class="badge" style="margin-left: 10px; background: #ffc107; color: #333;">Draft</span>
            @endif
        </div>
        
        <div style="margin-bottom: 20px;">
            <strong style="color: #667eea;">Created:</strong>
            <small style="color: #888; margin-left: 10px;">{{ $skill->created_at->format('d M Y à H:i') }}</small>
        </div>
    </div>
    
    <div class="action-buttons">
        <a href="{{ route('skills.edit', $skill->id) }}" class="action-btn action-btn-edit" style="text-decoration: none; display: inline-block;">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <a href="{{ route('skills.index') }}" class="action-btn" style="background: #6c757d; color: white;">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>
