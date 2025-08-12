<!-- partial:partials/_footer.html -->
<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">
            Copyright © {{ date('Y') }} {{ config('app.name', 'Voting System') }}
        </span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
            Secure Online Voting Platform
            <a href="{{ route('admin.dashboard') }}" target="_blank">Admin Dashboard</a>
        </span>
    </div>
</footer>
