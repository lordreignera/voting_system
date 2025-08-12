@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
{{-- Header Cards --}}
<div class="row">
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">0</h3>
                            <p class="text-success ms-2 mb-0 font-weight-medium">+0%</p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-success">
                            <span class="mdi mdi-vote icon-item"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Total Elections</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">0</h3>
                            <p class="text-success ms-2 mb-0 font-weight-medium">+0%</p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-success">
                            <span class="mdi mdi-account-multiple icon-item"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Total Candidates</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">{{ \App\Models\User::role('Voter')->count() }}</h3>
                            <p class="text-info ms-2 mb-0 font-weight-medium">+100%</p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-info">
                            <span class="mdi mdi-account-group icon-item"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Registered Voters</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">0</h3>
                            <p class="text-success ms-2 mb-0 font-weight-medium">+0%</p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-success">
                            <span class="mdi mdi-check-circle icon-item"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Total Votes Cast</h6>
            </div>
        </div>
    </div>
</div>

{{-- Welcome Message --}}
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card corona-gradient-card">
            <div class="card-body py-0 px-0 px-sm-3">
                <div class="row align-items-center">
                    <div class="col-4 col-sm-3 col-xl-2">
                        <img src="{{ asset('admin-assets/assets/images/dashboard/Group126@2x.png') }}" class="gradient-corona-img img-fluid" alt="">
                    </div>
                    <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Welcome, {{ Auth::user()->name }}!</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">You're logged in as {{ Auth::user()->roles->first()->name ?? 'Super Admin' }}. Ready to manage your voting system!</p>
                    </div>
                    <div class="col-3 col-sm-2 col-xl-2 ps-0 text-center">
                        <span>
                            <a href="{{ route('admin.elections.create') }}" class="btn btn-outline-light btn-rounded get-started-btn">Create Election</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Main Content Row --}}
<div class="row">
    {{-- Active Elections --}}
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Active Elections</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Election Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Sample data - will be replaced with real data --}}
                            <tr>
                                <td>Presidential Election 2024</td>
                                <td>Jan 15, 2024</td>
                                <td>Jan 20, 2024</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-primary">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Senate Election 2024</td>
                                <td>Feb 01, 2024</td>
                                <td>Feb 05, 2024</td>
                                <td><span class="badge badge-warning">Upcoming</span></td>
                                <td>
                                    <button class="btn btn-sm btn-primary">View</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Recent Activity --}}
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Recent Activity</h4>
                <div class="preview-list">
                    <div class="preview-item border-bottom">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-primary">
                                <i class="mdi mdi-vote"></i>
                            </div>
                        </div>
                        <div class="preview-item-content d-sm-flex flex-grow">
                            <div class="flex-grow">
                                <h6 class="preview-subject">New Election Created</h6>
                                <p class="text-muted mb-0">Presidential Election 2024 has been created</p>
                            </div>
                            <div class="me-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">15 minutes ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="preview-item border-bottom">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-success">
                                <i class="mdi mdi-account-multiple"></i>
                            </div>
                        </div>
                        <div class="preview-item-content d-sm-flex flex-grow">
                            <div class="flex-grow">
                                <h6 class="preview-subject">Candidates Added</h6>
                                <p class="text-muted mb-0">5 new candidates registered</p>
                            </div>
                            <div class="me-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">1 hour ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="preview-item border-bottom">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-info">
                                <i class="mdi mdi-key-variant"></i>
                            </div>
                        </div>
                        <div class="preview-item-content d-sm-flex flex-grow">
                            <div class="flex-grow">
                                <h6 class="preview-subject">OTPs Generated</h6>
                                <p class="text-muted mb-0">Voter OTPs sent via email</p>
                            </div>
                            <div class="me-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">2 hours ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Charts Row --}}
<div class="row">
    <div class="col-sm-4 grid-margin">
        <div class="card">
            <div class="card-body">
                <h5>Voter Turnout</h5>
                <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                            <h2 class="mb-0">75.3%</h2>
                            <p class="text-success ms-2 mb-0 font-weight-medium">+5.2%</p>
                        </div>
                        <h6 class="text-muted font-weight-normal">Average turnout rate</h6>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-chart-pie text-primary ms-auto"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 grid-margin">
        <div class="card">
            <div class="card-body">
                <h5>Active Elections</h5>
                <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                            <h2 class="mb-0">{{ $activeElections ?? 3 }}</h2>
                            <p class="text-success ms-2 mb-0 font-weight-medium">+8.3%</p>
                        </div>
                        <h6 class="text-muted font-weight-normal">Currently running</h6>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-vote text-success ms-auto"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 grid-margin">
        <div class="card">
            <div class="card-body">
                <h5>System Security</h5>
                <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                            <h2 class="mb-0">99.9%</h2>
                            <p class="text-success ms-2 mb-0 font-weight-medium">Secure</p>
                        </div>
                        <h6 class="text-muted font-weight-normal">System uptime & security</h6>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-shield-check text-info ms-auto"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Quick Actions --}}
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Quick Actions</h4>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.elections.create') }}" class="btn btn-primary btn-lg btn-block">
                            <i class="mdi mdi-vote"></i> Create Election
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.candidates.create') }}" class="btn btn-success btn-lg btn-block">
                            <i class="mdi mdi-account-multiple"></i> Add Candidate
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.voters.import') }}" class="btn btn-info btn-lg btn-block">
                            <i class="mdi mdi-account-group"></i> Import Voters
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.results.index') }}" class="btn btn-warning btn-lg btn-block">
                            <i class="mdi mdi-chart-bar"></i> View Results
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.icon-box-success, .icon-box-info, .icon-box-warning, .icon-box-danger {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
}
.icon-box-success { background-color: #e8f5e8; }
.icon-box-info { background-color: #e3f2fd; }
.icon-box-warning { background-color: #fff3e0; }
.icon-box-danger { background-color: #ffebee; }
</style>
@endpush
