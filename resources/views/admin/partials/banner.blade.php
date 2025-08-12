{{-- Top promotional banner - can be removed/customized --}}
<div class="row p-0 m-0 proBanner" id="proBanner">
    <div class="col-md-12 p-0 m-0">
        <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
                <div class="d-flex align-items-center justify-content-between">
                    <p class="mb-0 font-weight-medium me-3 buy-now-text">
                        Secure Online Voting System - Manage elections, candidates, and voters efficiently!
                    </p>
                    <a href="{{ route('admin.elections.create') }}" 
                       class="btn me-2 buy-now-btn border-0">Create Election</a>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="mdi mdi-home me-3 text-white"></i>
                </a>
                <button id="bannerClose" class="btn border-0 p-0">
                    <i class="mdi mdi-close text-white me-0"></i>
                </button>
            </div>
        </div>
    </div>
</div>
