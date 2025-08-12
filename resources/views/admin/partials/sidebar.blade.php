<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{ route('admin.dashboard') }}" style="display: flex; align-items: center; text-decoration: none;">
            <div style="background: white; border-radius: 8px; padding: 8px; margin-right: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <i class="mdi mdi-vote" style="font-size: 32px; color: #2f8cea;"></i>
            </div>
            <span style="color: white; font-weight: 600; font-size: 18px;">E-VotePortal</span>
        </a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle" src="{{ asset('admin-assets/assets/images/faces/face15.jpg') }}" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                        <span>{{ Auth::user()->roles->first()->name ?? 'Super Admin' }}</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                    <a href="{{ route('profile.show') }}" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-primary rounded-circle">
                                <i class="mdi mdi-settings text-white"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="dropdown-item preview-item border-0 bg-transparent p-0">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-logout text-danger"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">Logout</p>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        
        {{-- Elections Management --}}
        <li class="nav-item menu-items {{ request()->routeIs('admin.elections.*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#elections" aria-expanded="false" aria-controls="elections">
                <span class="menu-icon">
                    <i class="mdi mdi-vote"></i>
                </span>
                <span class="menu-title">Elections</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="elections">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.elections.index') }}">All Elections</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.elections.create') }}">Create Election</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.elections.active') }}">Active Elections</a>
                    </li>
                </ul>
            </div>
        </li>
        
        {{-- Candidates Management --}}
        <li class="nav-item menu-items {{ request()->routeIs('admin.candidates.*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#candidates" aria-expanded="false" aria-controls="candidates">
                <span class="menu-icon">
                    <i class="mdi mdi-account-multiple"></i>
                </span>
                <span class="menu-title">Candidates</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="candidates">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.candidates.index') }}">All Candidates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.candidates.create') }}">Add Candidate</a>
                    </li>
                </ul>
            </div>
        </li>
        
        {{-- Voters Management --}}
        <li class="nav-item menu-items {{ request()->routeIs('admin.voters.*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#voters" aria-expanded="false" aria-controls="voters">
                <span class="menu-icon">
                    <i class="mdi mdi-account-group"></i>
                </span>
                <span class="menu-title">Voters</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="voters">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.voters.index') }}">All Voters</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.voters.create') }}">Add Voter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.voters.import') }}">Import Voters</a>
                    </li>
                </ul>
            </div>
        </li>
        
        {{-- Results & Reports --}}
        <li class="nav-item menu-items {{ request()->routeIs('admin.results.*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#results" aria-expanded="false" aria-controls="results">
                <span class="menu-icon">
                    <i class="mdi mdi-chart-bar"></i>
                </span>
                <span class="menu-title">Results & Reports</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="results">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.results.index') }}">View Results</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.results.export') }}">Export Results</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.reports.audit') }}">Audit Trail</a>
                    </li>
                </ul>
            </div>
        </li>
        
        {{-- OTP Management --}}
        <li class="nav-item menu-items {{ request()->routeIs('admin.otp.*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#otp" aria-expanded="false" aria-controls="otp">
                <span class="menu-icon">
                    <i class="mdi mdi-key-variant"></i>
                </span>
                <span class="menu-title">OTP Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="otp">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.otp.generate') }}">Generate OTPs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.otp.send') }}">Send OTPs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.otp.logs') }}">OTP Logs</a>
                    </li>
                </ul>
            </div>
        </li>
        
        {{-- System Settings --}}
        <li class="nav-item menu-items {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.settings.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-settings"></i>
                </span>
                <span class="menu-title">System Settings</span>
            </a>
        </li>
    </ul>
</nav>
