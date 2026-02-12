<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superadmin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="{{ asset('folio/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('folio/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: #2c3e50;
            color: white;
            padding: 30px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 2px 0 15px rgba(0,0,0,0.1);
        }

        .sidebar-brand {
            padding: 0 25px 30px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }

        .sidebar-brand h2 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .sidebar-brand p {
            font-size: 0.85rem;
            color: rgba(255,255,255,0.7);
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin: 0;
        }

        .sidebar-menu a {
            display: block;
            padding: 15px 25px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(102, 126, 234, 0.1);
            color: white;
            border-left-color: #667eea;
            padding-left: 22px;
        }

        .sidebar-menu i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            padding: 30px;
            flex: 1;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-actions {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

        .btn-outline {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-outline:hover {
            background: #667eea;
            color: white;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 10px 15px;
            background: #f0f0f0;
            border-radius: 8px;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }

        .stat-card-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .stat-card-services .stat-card-icon { color: #667eea; }
        .stat-card-skills .stat-card-icon { color: #764ba2; }
        .stat-card-avis .stat-card-icon { color: #f093fb; }

        .stat-card h3 {
            font-size: 0.95rem;
            color: #888;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .stat-card .value {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
        }

        /* Content Section */
        .content-section {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }

        .content-section h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .content-section h2 i {
            color: #667eea;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #f8f9fa;
            font-weight: 600;
            color: #2c3e50;
            border: none;
            padding: 15px;
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            border-color: #eee;
        }

        .table tbody tr:hover {
            background: #f8f9fa;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.8rem;
        }

        .badge-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .badge-success {
            background: #d4edda;
            color: #155724;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.85rem;
            transition: all 0.2s;
        }

        .action-btn-edit {
            background: #e3f2fd;
            color: #1976d2;
        }

        .action-btn-edit:hover {
            background: #1976d2;
            color: white;
        }

        .action-btn-delete {
            background: #ffebee;
            color: #c62828;
        }

        .action-btn-delete:hover {
            background: #c62828;
            color: white;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #ddd;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
                padding: 15px;
            }

            .header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .header h1 {
                font-size: 1.5rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 0;
                margin-left: -280px;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-brand">
                <h2><i class="bi bi-speedometer2"></i> Dashboard</h2>
                <p>Superadmin Panel</p>
            </div>

            <ul class="sidebar-menu">
                <li><a href="{{ route('dashboard') }}" class="active"><i class="bi bi-house"></i> Dashboard</a></li>
                <li><a href="{{ route('services.index') }}"><i class="bi bi-briefcase"></i> Services</a></li>
                <li><a href="{{ route('skills.index') }}"><i class="bi bi-star"></i> Skills</a></li>
                <li><a href="{{ route('avis.index') }}"><i class="bi bi-chat-left-quote"></i> Testimonials</a></li>
                <li style="margin-top: 30px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 20px;">
                    <a href="{{ route('index') }}"><i class="bi bi-globe"></i> View Site</a>
                </li>
                
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <h1>
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </h1>
                <div class="header-actions">
                    <a href="{{ route('services.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> New Service
                    </a>
                    <div class="user-profile">
                        <div>
                            <div style="font-weight: 500; font-size: 0.9rem;">{{ auth()->user()->name ?? 'Admin' }}</div>
                            <div style="font-size: 0.8rem; color: #888;">Superadmin</div>
                        </div>
                    </div>
                </div>
            </div>

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

            <!-- Recent Skills -->
            <div class="content-section">
                <h2>
                    <i class="bi bi-star"></i>
                    Recent Skills
                </h2>
                @if($recentSkills->count() > 0)
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
                            @foreach($recentSkills as $skill)
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
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="empty-state">
                        <i class="bi bi-inbox"></i>
                        <p>No skills yet. <a href="{{ route('skills.create') }}">Create one</a></p>
                    </div>
                @endif
            </div>

            <!-- Recent Testimonials -->
            <div class="content-section">
                <h2>
                    <i class="bi bi-chat-left-quote"></i>
                    Recent Testimonials
                </h2>
                @if($recentAvis->count() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Message</th>
                                <th>Published</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentAvis as $avi)
                                <tr>
                                    <td>{{ Str::limit($avi->message, 50) }}</td>
                                    <td>{{ $avi->published_at ? $avi->published_at->format('d M Y') : 'Not Published' }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('avis.show', $avi->id) }}" class="action-btn action-btn-edit">
                                                <i class="bi bi-eye"></i> View
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
                        <p>No testimonials yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="{{ asset('folio/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
