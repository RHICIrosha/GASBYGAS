@extends('layouts.customer')

@section('content')

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Page Header -->
        {{-- <div class="page-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="fw-bold">Dashboard</h1>
                    <p class="lead">Welcome back, John! Manage your gas orders and track deliveries.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <button class="btn btn-warning btn-lg">
                        <i class="fas fa-plus-circle me-2"></i>New Gas Order
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Dashboard Stats -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="dashboard-card d-flex align-items-center">
                    <div class="card-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">5</h5>
                        <p class="text-muted mb-0">Total Orders</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-card d-flex align-items-center">
                    <div class="card-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">1</h5>
                        <p class="text-muted mb-0">Pending Delivery</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-card d-flex align-items-center">
                    <div class="card-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">3</h5>
                        <p class="text-muted mb-0">Completed Orders</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-card d-flex align-items-center">
                    <div class="card-icon">
                        <i class="fas fa-thumbs-up"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">2</h5>
                        <p class="text-muted mb-0">Active Tokens</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gas Types Section -->
        <h4 class="mb-4">Available Gas Types</h4>
        <div class="row">
            <!-- Residential Gas -->
            <div class="col-md-3">
                <div class="gas-type-card">
                    <div class="gas-type-img" style="background-image: url('{{ asset('img/12.png') }}');"></div>
                    <div class="gas-type-info">
                        <span class="gas-badge">Domestic</span>
                        <h5>Residential Gas</h5>
                        <p class="text-muted">Standard household cylinder for cooking purposes (12.5kg)</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fw-bold">Rs. 2,750.00</span>
                            <button class="btn btn-warning btn-sm">Order Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="gas-type-card">
                    <div class="gas-type-img" style="background-image:  url('{{ asset('img/5.png') }}');"></div>
                    <div class="gas-type-info">
                        <span class="gas-badge">Domestic</span>
                        <h5>Domestic Gas</h5>
                        <p class="text-muted">Small household cylinder for cooking or portable use (5kg).</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fw-bold">Rs. 1100.00</span>
                            <button class="btn btn-warning btn-sm">Order Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Industrial Gas -->
            <div class="col-md-3">
                <div class="gas-type-card">
                    <div class="gas-type-img" style="background-image: url('{{ asset('img/37.png') }}');"></div>
                    <div class="gas-type-info">
                        <span class="gas-badge">Commercial</span>
                        <h5>Commercial Gas</h5>
                        <p class="text-muted">5Commercial grade cylinder for restaurants and small businesses (37.5kg)</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fw-bold">Rs. 7,800.00</span>
                            <button class="btn btn-warning btn-sm">Order Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Business Gas -->
            <div class="col-md-3">
                <div class="gas-type-card">
                    <div class="gas-type-img" style="background-image: url('{{ asset('img/45.png') }}');"></div>
                    <div class="gas-type-info">
                        <span class="gas-badge">Industrial</span>
                        <h5>Industrial Gas</h5>
                        <p class="text-muted">Large cylinder for industrial applications (45kg)</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fw-bold">Rs. 9,500.00</span>
                            <button class="btn btn-warning btn-sm">Order Now</button>
                        </div>
                    </div>
                </div>
            </div>


        <!-- Recent Orders -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="dashboard-card">
                    <h4 class="mb-4">Recent Orders</h4>
                    <div class="table-responsive">
                        <table class="table table-hover order-history-table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Gas Type</th>
                                    <th>Outlet</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>GAS1234</td>
                                    <td>2024-03-01</td>
                                    <td>Residential Gas</td>
                                    <td>Colombo Outlet</td>
                                    <td><span class="status-indicator confirmed"></span> Confirmed</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Track</button>
                                        <button class="btn btn-sm btn-outline-secondary">Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>GAS1187</td>
                                    <td>2024-02-15</td>
                                    <td>Residential Gas</td>
                                    <td>Colombo Outlet</td>
                                    <td><span class="status-indicator completed"></span> Completed</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-secondary">Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>GAS1023</td>
                                    <td>2024-01-22</td>
                                    <td>Portable Gas</td>
                                    <td>Colombo Outlet</td>
                                    <td><span class="status-indicator completed"></span> Completed</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-secondary">Details</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-3">
                        <a href="#" class="btn btn-outline-warning">View All Orders</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Delivery -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="dashboard-card">
                    <h4 class="mb-4">Nearest Outlets</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Outlet Name</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Colombo Outlet</td>
                                    <td>123 Galle Road, Colombo 03</td>
                                    <td>0111234567</td>
                                    <td><span class="badge bg-success">Available</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Order</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Negombo Outlet</td>
                                    <td>200 Beach Road, Negombo</td>
                                    <td>0312233445</td>
                                    <td><span class="badge bg-success">Available</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Order</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kandy Outlet</td>
                                    <td>45 Dalada Veediya, Kandy</td>
                                    <td>0812233445</td>
                                    <td><span class="badge bg-danger">Stock Out</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" disabled>Order</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-3">
                        <a href="#" class="btn btn-outline-warning">View All Outlets</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
