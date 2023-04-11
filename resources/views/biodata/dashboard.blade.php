<div class="dashboard-section">
            <h2>My Profile</h2>
            <p>Name: {{ auth()->user()->full_name }}</p>
            <p>Email: {{ auth()->user()->email }}</p>
            <a href="{{ route('biodata.showForCurrentUser') }}">View Biodata</a>
        </div>