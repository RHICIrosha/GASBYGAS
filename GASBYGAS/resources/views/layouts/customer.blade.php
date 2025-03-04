<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard - LPG Sri Lanka</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            background: #f8f9fa;
        }

        .navbar {
            background: linear-gradient(to right, #f7d44a, #f8a427);
        }

        .sidebar {
            position: fixed;
            top: 56px;
            left: 0;
            height: 100%;
            width: 250px;
            background: #2c3e50;
            padding-top: 20px;
            transition: all 0.3s;
            z-index: 999;
        }

        .sidebar .nav-link {
            color: #ecf0f1;
            padding: 12px 20px;
            margin-bottom: 5px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.1);
            color: #f8a427;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
        }

        .page-header {
            background: linear-gradient(to right, #f7e08362, #f8a42746);
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .dashboard-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
        }

        .dashboard-card .card-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(to right, #f7d44a, #f8a427);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }

        .dashboard-card .card-icon i {
            font-size: 24px;
            color: white;
        }

        .dashboard-card h5 {
            font-weight: 600;
        }

        .gas-type-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .gas-type-card:hover {
            transform: translateY(-5px);
        }

        .gas-type-img {
            height: 300px;
            background-size: cover;
            background-position: center;
        }

        .gas-type-info {
            padding: 20px;
        }

        .gas-type-info h5 {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .gas-badge {
            background: linear-gradient(to right, #f7d44a, #f8a427);
            color: white;
            font-size: 0.8rem;
            padding: 5px 10px;
            border-radius: 20px;
            margin-bottom: 10px;
            display: inline-block;
        }

        .order-history-table th {
            background: #f8a427;
            color: white;
        }

        .toggle-sidebar {
            display: none;
            position: fixed;
            top: 70px;
            left: 20px;
            z-index: 1000;
            background: #f8a427;
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            font-size: 18px;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-250px);
            }

            .main-content {
                margin-left: 0;
            }

            .toggle-sidebar {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .toggle-sidebar.active {
                left: 270px;
            }
        }

        .profile-section {
            margin-bottom: 20px;
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .profile-pic {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 0 auto 10px;
            border: 3px solid #f8a427;
            object-fit: cover;
        }

        .profile-name {
            color: white;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .profile-email {
            color: #bdc3c7;
            font-size: 0.8rem;
            margin-bottom: 0;
        }

        .status-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }

        .status-indicator.pending {
            background-color: #ffc107;
        }

        .status-indicator.confirmed {
            background-color: #17a2b8;
        }

        .status-indicator.completed {
            background-color: #28a745;
        }

        .status-indicator.cancelled {
            background-color: #dc3545;
        }
    </style>

   @yield('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" width="40" height="40">
                LPG Sri Lanka
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-bell"></i>
                            <span class="badge bg-danger rounded-pill">3</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><h6 class="dropdown-header">Notifications</h6></li>
                            <li><a class="dropdown-item" href="#">Your order #GAS1234 is confirmed</a></li>
                            <li><a class="dropdown-item" href="#">Gas delivery scheduled for tomorrow</a></li>
                            <li><a class="dropdown-item" href="#">Special offer: 10% discount on next order</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-center" href="#">View all notifications</a></li>
                        </ul>
                    </li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar Toggle Button -->
    <button class="toggle-sidebar" id="toggleSidebar">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="profile-section">
             <h6 class="profile-name">{{ Auth::user()->name }}</h6>
            <p class="profile-email">{{ Auth::user()->email }}</p>
        </div>
        <ul class="nav flex-column px-3">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('orders.create') }}">
                    <i class="fas fa-shopping-cart"></i> Place Order
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-list-alt"></i> My Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-map-marker-alt"></i> Track Delivery
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-history"></i> Order History
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-store"></i> Find Outlets
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-bell"></i> Notifications
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-user"></i> My Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-question-circle"></i> Help & Support
                </a>
            </li>
            <li class="nav-item mt-3">
                <a class="nav-link text-danger" href="#">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>
    @yield('content')
    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const toggleSidebar = document.getElementById('toggleSidebar');
            const mainContent = document.getElementById('mainContent');

            toggleSidebar.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                toggleSidebar.classList.toggle('active');

                if (window.innerWidth <= 991) {
                    if (sidebar.classList.contains('active')) {
                        mainContent.style.marginLeft = '250px';
                    } else {
                        mainContent.style.marginLeft = '0';
                    }
                }
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 991) {
                    mainContent.style.marginLeft = '250px';
                    sidebar.classList.remove('active');
                    toggleSidebar.classList.remove('active');
                } else {
                    if (!sidebar.classList.contains('active')) {
                        mainContent.style.marginLeft = '0';
                    }
                }
            });
        });
    </script>
</body>
</html>
