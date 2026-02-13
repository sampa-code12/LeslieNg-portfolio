<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - Superadmin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="{{ asset('folio/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('folio/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('folio/assets/css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
    <button class="sidebar-toggle-btn" id="sidebarToggleBtn" style="position:fixed;top:18px;left:18px;z-index:1001;background:#2c3e50;color:#fff;border:none;border-radius:4px;padding:8px 12px;font-size:1.5rem;cursor:pointer;">
        <i class="bi bi-list"></i>
    </button>
    <div class="sidebar-backdrop" id="sidebarBackdrop" style="position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.3);z-index:999;"></div>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
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
    <script>
        // Sidebar toggle for mobile
        console.log('Sidebar script loaded');
        
        const sidebar = document.getElementById('sidebar');
        const sidebarToggleBtn = document.getElementById('sidebarToggleBtn');
        const sidebarBackdrop = document.getElementById('sidebarBackdrop');
        
        if (!sidebar) console.error('Sidebar not found!');
        if (!sidebarToggleBtn) console.error('Toggle button not found!');
        if (!sidebarBackdrop) console.error('Backdrop not found!');
        
        function openSidebar() {
            console.log('Opening sidebar...');
            if (sidebar) {
                sidebar.classList.add('open');
                console.log('Added open class, current classes:', sidebar.className);
            }
            if (sidebarBackdrop) {
                sidebarBackdrop.classList.add('active');
                sidebarBackdrop.style.display = 'block';
            }
        }
        
        function closeSidebar() {
            console.log('Closing sidebar...');
            if (sidebar) {
                sidebar.classList.remove('open');
                console.log('Removed open class, current classes:', sidebar.className);
            }
            if (sidebarBackdrop) {
                sidebarBackdrop.classList.remove('active');
                sidebarBackdrop.style.display = 'none';
            }
        }
        
        // Button click handler
        if (sidebarToggleBtn) {
            sidebarToggleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                console.log('Button clicked, window width:', window.innerWidth);
                if (window.innerWidth <= 991.98) {
                    openSidebar();
                }
            });
            console.log('Button listener attached');
        }
        
        // Backdrop click handler
        if (sidebarBackdrop) {
            sidebarBackdrop.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                console.log('Backdrop clicked');
                closeSidebar();
            });
            console.log('Backdrop listener attached');
        }
        
        // Close sidebar when clicking menu items on mobile
        if (sidebar) {
            sidebar.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 991.98) {
                        console.log('Menu item clicked on mobile');
                        closeSidebar();
                    }
                });
            });
            console.log('Menu item listeners attached');
        }
    </script>
    </body>
</html>
