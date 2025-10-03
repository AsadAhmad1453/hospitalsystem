<!-- Sidebar -->
<nav class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin-new.dashboard') }}" class="sidebar-brand">
            <i class="fas fa-hospital"></i>
            <span class="brand-text">Shafayaat</span>
        </a>
    </div>
    
    <div class="sidebar-nav">
        <ul class="nav flex-column">
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin-new.dashboard') ? 'active' : '' }}" href="{{ route('admin-new.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- User Management -->
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin-new.users') ? 'active' : '' }}" href="{{ route('admin-new.users') }}">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                    <span class="badge">{{ \App\Models\User::count() }}</span>
                </a>
            </li>

            <!-- Staff & Permissions -->
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin-new.staff') ? 'active' : '' }}" href="{{ route('admin-new.staff') }}">
                    <i class="fas fa-user-shield"></i>
                    <span>Staff & Permissions</span>
                </a>
            </li>

            <!-- Patient Management -->
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin-new.patients') ? 'active' : '' }}" href="{{ route('admin-new.patients') }}">
                    <i class="fas fa-user-injured"></i>
                    <span>Patients</span>
                    <span class="badge">{{ \App\Models\Patient::count() }}</span>
                </a>
            </li>

            <!-- Services -->
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin-new.services') ? 'active' : '' }}" href="{{ route('admin-new.services') }}">
                    <i class="fas fa-stethoscope"></i>
                    <span>Services</span>
                </a>
            </li>

            <!-- Form Builder -->
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin-new.question-sections') || Route::is('admin-new.questions') || Route::is('admin-new.forms') || Route::is('admin-new.relations') ? 'active' : '' }}" 
                   href="#" data-bs-toggle="collapse" data-bs-target="#formBuilderMenu">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Form Builder</span>
                    <i class="fas fa-chevron-down ms-auto"></i>
                </a>
                <div class="collapse submenu {{ Route::is('admin-new.question-sections') || Route::is('admin-new.questions') || Route::is('admin-new.forms') || Route::is('admin-new.relations') ? 'show' : '' }}" 
                     id="formBuilderMenu">
                    <a class="nav-link {{ Route::is('admin-new.question-sections') ? 'active' : '' }}" href="{{ route('admin-new.question-sections') }}">
                        <i class="fas fa-layer-group"></i>
                        <span>Sections</span>
                    </a>
                    <a class="nav-link {{ Route::is('admin-new.questions') ? 'active' : '' }}" href="{{ route('admin-new.questions') }}">
                        <i class="fas fa-question-circle"></i>
                        <span>Questions</span>
                    </a>
                    <a class="nav-link {{ Route::is('admin-new.forms') ? 'active' : '' }}" href="{{ route('admin-new.forms') }}">
                        <i class="fas fa-file-alt"></i>
                        <span>Forms</span>
                    </a>
                    <a class="nav-link {{ Route::is('admin-new.relations') ? 'active' : '' }}" href="{{ route('admin-new.relations') }}">
                        <i class="fas fa-project-diagram"></i>
                        <span>Relations</span>
                    </a>
                </div>
            </li>

            <!-- Laboratory -->
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin-new.blood-investigation') || Route::is('admin-new.xrays') || Route::is('admin-new.ultrasounds') || Route::is('admin-new.ctscans') ? 'active' : '' }}" 
                   href="#" data-bs-toggle="collapse" data-bs-target="#laboratoryMenu">
                    <i class="fas fa-flask"></i>
                    <span>Laboratory</span>
                    <i class="fas fa-chevron-down ms-auto"></i>
                </a>
                <div class="collapse submenu {{ Route::is('admin-new.blood-investigation') || Route::is('admin-new.xrays') || Route::is('admin-new.ultrasounds') || Route::is('admin-new.ctscans') ? 'show' : '' }}" 
                     id="laboratoryMenu">
                    <a class="nav-link {{ Route::is('admin-new.blood-investigation') ? 'active' : '' }}" href="{{ route('admin-new.blood-investigation') }}">
                        <i class="fas fa-tint"></i>
                        <span>Blood Tests</span>
                    </a>
                    <a class="nav-link {{ Route::is('admin-new.xrays') ? 'active' : '' }}" href="{{ route('admin-new.xrays') }}">
                        <i class="fas fa-x-ray"></i>
                        <span>X-Rays</span>
                    </a>
                    <a class="nav-link {{ Route::is('admin-new.uss') ? 'active' : '' }}" href="{{ route('admin-new.uss') }}">
                        <i class="fas fa-wave-square"></i>
                        <span>Ultrasounds</span>
                    </a>
                    <a class="nav-link {{ Route::is('admin-new.ctscans') ? 'active' : '' }}" href="{{ route('admin-new.ctscans') }}">
                        <i class="fas fa-scan"></i>
                        <span>CT Scans</span>
                    </a>
                </div>
            </li>

            <!-- Pharmacy -->
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin-new.medicines') || Route::is('admin-new.dosage') ? 'active' : '' }}" 
                   href="#" data-bs-toggle="collapse" data-bs-target="#pharmacyMenu">
                    <i class="fas fa-pills"></i>
                    <span>Pharmacy</span>
                    <i class="fas fa-chevron-down ms-auto"></i>
                </a>
                <div class="collapse submenu {{ Route::is('admin-new.medicines') || Route::is('admin-new.dosage') ? 'show' : '' }}" 
                     id="pharmacyMenu">
                    <a class="nav-link {{ Route::is('admin-new.medicines') ? 'active' : '' }}" href="{{ route('admin-new.medicines') }}">
                        <i class="fas fa-capsules"></i>
                        <span>Medicines</span>
                    </a>
                    <a class="nav-link {{ Route::is('admin-new.dosage') ? 'active' : '' }}" href="{{ route('admin-new.dosage') }}">
                        <i class="fas fa-weight"></i>
                        <span>Dosage</span>
                    </a>
                </div>
            </li>

            <!-- Financial -->
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin-new.banks') ? 'active' : '' }}" href="{{ route('admin-new.banks') }}">
                    <i class="fas fa-university"></i>
                    <span>Banks</span>
                </a>
            </li>

            <!-- Settings -->
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin-new.settings') ? 'active' : '' }}" href="{{ route('admin-new.settings') }}">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>

            <!-- Profile -->
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin-new.profile') ? 'active' : '' }}" href="{{ route('admin-new.profile') }}">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
