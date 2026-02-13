<!-- Stats Grid -->
<div class="stats-grid">
    <!-- Services Card -->
    <div class="stat-card stat-card-services">
        <div class="stat-card-icon">
            <i class="bi bi-briefcase"></i>
        </div>
        <h3>Total Services</h3>
        <div class="value">{{ $servicesCount }}</div>
    </div>

    <!-- Skills Card -->
    <div class="stat-card stat-card-skills">
        <div class="stat-card-icon">
            <i class="bi bi-star"></i>
        </div>
        <h3>Total Skills</h3>
        <div class="value">{{ $skillsCount }}</div>
    </div>

    <!-- Testimonials Card -->
    <div class="stat-card stat-card-avis">
        <div class="stat-card-icon">
            <i class="bi bi-chat-left-quote"></i>
        </div>
        <h3>Total Testimonials</h3>
        <div class="value">{{ $avisCount }}</div>
    </div>
</div>

<!-- Recent Services -->
<div class="content-section">
    <h2>
        <i class="bi bi-briefcase"></i>
        Recent Services
    </h2>
    @if($recentServices->count() > 0)
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
                @foreach($recentServices as $service)
                    <tr>
                        <td><strong>{{ $service->title }}</strong></td>
                        <td><span class="badge badge-primary">{{ $service->category }}</span></td>
                        <td>{{ $service->published_at ? $service->published_at->format('d M Y') : 'Not Published' }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('services.show', $service->id) }}" class="action-btn action-btn-edit">
                                    <i class="bi bi-eye"></i> View
                                </a>
                                <a href="{{ route('services.edit', $service->id) }}" class="action-btn action-btn-edit">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="empty-state">
            <i class="bi bi-inbox"></i>
            <p>No services yet. <a href="{{ route('services.create') }}">Create one</a></p>
        </div>
    @endif
</div>
