<div class="sidebar" id="sidebar">
    <div class="profile-section">
        <img src="{{ asset('img/user-profile.jpg') }}" alt="Profile Picture" class="profile-pic">
        <h6 class="profile-name">{{ Auth::user()->name }}</h6>
        <p class="profile-email">{{ Auth::user()->email }}</p>
    </div>
    <ul class="nav flex-column px-3">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('place-order') ? 'active' : '' }}" href="{{ route('place-order') }}">
                <i class="fas fa-shopping-cart"></i> Place Order
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('my-orders') ? 'active' : '' }}" href="{{ route('my-orders') }}">
                <i class="fas fa-list-alt"></i> My Orders
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('track-delivery') ? 'active' : '' }}" href="{{ route('track-delivery') }}">
                <i class="fas fa-map-marker-alt"></i> Track Delivery
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('order-history') ? 'active' : '' }}" href="{{ route('order-history') }}">
                <i class="fas fa-history"></i> Order History
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('find-outlets') ? 'active' : '' }}" href="{{ route('find-outlets') }}">
                <i class="fas fa-store"></i> Find Outlets
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('notifications') ? 'active' : '' }}" href="{{ route('notifications') }}">
                <i class="fas fa-bell"></i> Notifications
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}" href="{{ route('profile') }}">
                <i class="fas fa-user"></i> My Profile
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('support') ? 'active' : '' }}" href="{{ route('support') }}">
                <i class="fas fa-question-circle"></i> Help & Support
            </a>
        </li>
        <li class="nav-item mt-3">
            <a class="nav-link text-danger" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </li>
    </ul>
</div>
