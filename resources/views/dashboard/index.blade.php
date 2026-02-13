<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        /* Sidebar Submenu */
        .sidebar-submenu {
            margin: 0;
        }

        .sidebar-toggle {
            display: block;
            padding: 15px 25px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            cursor: pointer;
            width: 100%;
            border: none;
            background: none;
            text-align: left;
            font-family: inherit;
            font-size: inherit;
        }

        .sidebar-toggle:hover {
            background: rgba(102, 126, 234, 0.1);
            color: white;
        }

        .sidebar-submenu-list {
            list-style: none;
            padding: 0;
            margin: 0;
            background: rgba(0,0,0,0.2);
        }

        .sidebar-submenu-list li {
            margin: 0;
        }

        .sidebar-submenu-list a {
            display: block;
            padding: 12px 25px 12px 50px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            font-size: 0.9rem;
        }

        .sidebar-submenu-list a:hover,
        .sidebar-submenu-list a.active {
            background: rgba(102, 126, 234, 0.15);
            color: white;
            border-left-color: #667eea;
            padding-left: 47px;
        }

        .main-content {
            margin-left: 280px;
            padding: 30px;
            flex: 1;
            overflow-y: auto;
            max-height: 100vh;
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

        /* Content Area */
        #content-area {
            min-height: 400px;
        }

        .loading {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 40px;
            color: #667eea;
        }

        .spinner-border {
            width: 20px;
            height: 20px;
            border: 2px solid rgba(102, 126, 234, 0.3);
            border-top-color: #667eea;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
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
            flex-wrap: wrap;
        }

        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.85rem;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
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
                <li><a class="sidebar-link active" data-section="dashboard"><i class="bi bi-house"></i> Dashboard</a></li>
                
                <!-- Services Dropdown -->
                <li class="sidebar-submenu">
                    <a href="#" class="sidebar-toggle" data-target="services-menu">
                        <i class="bi bi-briefcase"></i> Services
                        <i class="bi bi-chevron-down" style="float: right; font-size: 0.8rem;"></i>
                    </a>
                    <ul class="sidebar-submenu-list" id="services-menu" style="display: none;">
                        <li><a class="sidebar-link" data-section="services-index"><i class="bi bi-list"></i> All Services</a></li>
                        <li><a class="sidebar-link" data-section="services-create"><i class="bi bi-plus-circle"></i> New Service</a></li>
                    </ul>
                </li>

                <!-- Skills Dropdown -->
                <li class="sidebar-submenu">
                    <a href="#" class="sidebar-toggle" data-target="skills-menu">
                        <i class="bi bi-star"></i> Skills
                        <i class="bi bi-chevron-down" style="float: right; font-size: 0.8rem;"></i>
                    </a>
                    <ul class="sidebar-submenu-list" id="skills-menu" style="display: none;">
                        <li><a class="sidebar-link" data-section="skills-index"><i class="bi bi-list"></i> All Skills</a></li>
                        <li><a class="sidebar-link" data-section="skills-create"><i class="bi bi-plus-circle"></i> New Skill</a></li>
                    </ul>
                </li>

                <!-- Testimonials Dropdown -->
                <li class="sidebar-submenu">
                    <a href="#" class="sidebar-toggle" data-target="testimonials-menu">
                        <i class="bi bi-chat-left-quote"></i> Testimonials
                        <i class="bi bi-chevron-down" style="float: right; font-size: 0.8rem;"></i>
                    </a>
                    <ul class="sidebar-submenu-list" id="testimonials-menu" style="display: none;">
                        <li><a class="sidebar-link" data-section="testimonials-index"><i class="bi bi-list"></i> All Testimonials</a></li>
                        <li><a class="sidebar-link" data-section="testimonials-create"><i class="bi bi-plus-circle"></i> New Testimonial</a></li>
                    </ul>
                </li>

                <li style="margin-top: 30px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 20px;">
                    <a href="{{ route('index') }}" target="_blank"><i class="bi bi-globe"></i> View Site</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <h1>
                    <i class="bi bi-speedometer2"></i>
                    <span id="page-title">Dashboard</span>
                </h1>
                <div class="header-actions">
                    <a href="{{ route('services.create') }}" class="btn btn-primary" id="create-btn" style="display: none;">
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

            <!-- Content Area -->
            <div id="content-area">
                <!-- Loaded dynamically -->
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000;">
        <div class="modal-dialog" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; border-radius: 12px; max-width: 600px; width: 90%; max-height: 90vh; overflow-y: auto; box-shadow: 0 15px 50px rgba(0,0,0,0.3);">
            <div class="modal-header" style="padding: 20px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center;">
                <h5 id="modalTitle" style="margin: 0; font-size: 1.5rem; font-weight: 700; color: #2c3e50;">Edit</h5>
                <button type="button" onclick="closeModal()" style="background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #999;">×</button>
            </div>
            <div class="modal-body" id="modalContent" style="padding: 20px;">
                <!-- Content loaded here -->
            </div>
        </div>
    </div>

    <script src="{{ asset('folio/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        const contentArea = document.getElementById('content-area');
        const pageTitle = document.getElementById('page-title');
        const createBtn = document.getElementById('create-btn');
        const editModal = document.getElementById('editModal');
        const modalContent = document.getElementById('modalContent');
        const modalTitle = document.getElementById('modalTitle');
        
        // Empêcher les clics dans le modal de se propager
        modalContent.addEventListener('click', (e) => {
            e.stopPropagation();
        });
        
        // Délégation d'événements pour les boutons d'action (view/edit)
        contentArea.addEventListener('click', function(e) {
            const btn = e.target.closest('[data-action]');
            if (!btn) return;
            
            e.preventDefault();
            e.stopPropagation();
            
            const action = btn.dataset.action;
            const type = btn.dataset.type;
            const id = btn.dataset.id;
            
            console.log('Action clicked:', action, 'Type:', type, 'ID:', id);
            
            if (action === 'view') {
                loadDetail(type, id);
            } else if (action === 'edit') {
                loadEditForm(type, id);
            }
        });
        
        // Charger le dashboard au démarrage
        loadSection('dashboard');
        
        // Gestion des toggles de submenu
        document.querySelectorAll('.sidebar-toggle').forEach(toggle => {
            toggle.addEventListener('click', (e) => {
                e.preventDefault();
                const target = document.getElementById(toggle.dataset.target);
                if (target.style.display === 'none') {
                    target.style.display = 'block';
                } else {
                    target.style.display = 'none';
                }
            });
        });
        
        // Event listeners pour les liens du sidebar
        document.querySelectorAll('.sidebar-link').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const section = link.dataset.section;
                loadSection(section);
                
                // Mettre à jour l'active
                document.querySelectorAll('.sidebar-link').forEach(l => l.classList.remove('active'));
                link.classList.add('active');
            });
        });
        
        function loadSection(section) {
            contentArea.innerHTML = '<div class="loading"><div class="spinner-border"></div> <span>Chargement...</span></div>';
            
            fetch(`/dashboard/section/${section}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                contentArea.innerHTML = data.html;
                pageTitle.textContent = data.title;
                
                // Afficher/masquer le bouton "New" basé sur la section
                if (section.includes('-index')) {
                    createBtn.style.display = 'inline-flex';
                } else {
                    createBtn.style.display = 'none';
                }
                
                // Attacher les listeners pour show/edit
                attachViewEditListeners();
            })
            .catch(error => {
                contentArea.innerHTML = '<div class="alert alert-danger">Erreur lors du chargement du contenu</div>';
                console.error('Erreur:', error);
            });
        }
        
        function attachViewEditListeners() {
            // Cette fonction n'a plus besoin de faire quelque chose
            // Les event listeners sont maintenant gérés par la délégation d'événements
            console.log('Section loaded - event delegation active');
        }
        
        function loadDetail(type, id) {
            contentArea.innerHTML = '<div class="loading"><div class="spinner-border"></div> <span>Chargement...</span></div>';
            
            fetch(`/dashboard/${type}/${id}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                contentArea.innerHTML = data.html;
                pageTitle.textContent = `View ${data.title}`;
                attachViewEditListeners();
            })
            .catch(error => {
                contentArea.innerHTML = '<div class="alert alert-danger">Erreur lors du chargement du détail</div>';
                console.error('Erreur:', error);
            });
        }
        
        function loadEditForm(type, id) {
            console.log('loadEditForm called:', type, id);
            fetch(`/dashboard/${type}/${id}/edit-form`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Edit form loaded:', data);
                modalTitle.textContent = `Edit ${data.title}`;
                modalContent.innerHTML = data.html;
                editModal.style.display = 'block';
                
                // Ajouter le listener de submit au nouveau formulaire
                setTimeout(() => {
                    const form = modalContent.querySelector('form');
                    if (form) {
                        // Clone le formulaire pour enlever les anciens listeners
                        const newForm = form.cloneNode(true);
                        form.parentNode.replaceChild(newForm, form);
                        
                        newForm.addEventListener('submit', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            console.log('Form submitted');
                            submitEditForm(newForm, type, id);
                        });
                    }
                }, 100);
            })
            .catch(error => {
                alert('Erreur lors du chargement du formulaire');
                console.error('Erreur:', error);
            });
        }
        
        function submitEditForm(form, type, id) {
            console.log('submitEditForm called:', type, id);
            const formData = new FormData(form);
            formData.append('_method', 'PUT');
            console.log('Form data prepared');
            
            // Construct the correct route URL based on type
            const routeMap = {
                'services': `/services/${id}`,
                'skills': `/skills/${id}`,
                'avis': `/avis/${id}`
            };
            
            const url = routeMap[type] || `/${type}/${id}`;
            console.log('Sending to URL:', url);
            
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => {
                console.log('Response status:', response.status);
                return response.json();
            })
            .then(data => {
                console.log('Response data:', data);
                if (data.success) {
                    closeModal();
                    alert('Mise à jour réussie!');
                    // Recharger la liste ou le détail
                    loadSection(`${type}-index`);
                } else {
                    alert('Erreur: ' + (data.message || 'Une erreur est survenue'));
                }
            })
            .catch(error => {
                alert('Erreur lors de la mise à jour');
                console.error('Erreur:', error);
            });
        }
        
        function closeModal() {
            console.log('Closing modal');
            editModal.style.display = 'none';
            modalContent.innerHTML = '';
        }
        
        // Le bouton X dans le modal appelle closeModal()
        // Les clics dans le modal sont empêchés de se propager (voir ci-dessus)
    </script>
</body>
</html>
