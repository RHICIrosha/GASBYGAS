@extends('layouts.customer')

@section('title', 'Track Order - GasByGas')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card p-4">
                <h3 class="mb-4">Track Your Order</h3>

                <div class="card border-warning mb-4">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">Order Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Request Number:</div>
                            <div class="col-md-8">{{ $gasRequest->request_number }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Token Number:</div>
                            <div class="col-md-8">{{ $gasRequest->token->token_number }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Requested Date:</div>
                            <div class="col-md-8">{{ $gasRequest->created_at->format('d M, Y h:i A') }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Status:</div>
                            <div class="col-md-8">
                                <span class="badge {{ $gasRequest->status == 'Pending' ? 'bg-warning text-dark' : ($gasRequest->status == 'Confirmed' ? 'bg-primary' : 'bg-success') }}">
                                    {{ $gasRequest->status }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Tracking Timeline -->
                <div class="order-timeline mb-4">
                    <h5 class="mb-3">Order Progress</h5>

                    <div class="timeline-item">
                        <div class="timeline-dot {{ $gasRequest->created_at ? 'active' : '' }}"></div>
                        <div class="timeline-content">
                            <h6>Order Placed</h6>
                            <p class="text-muted">{{ $gasRequest->created_at ? $gasRequest->created_at->format('d M, Y h:i A') : 'Pending' }}</p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-dot {{ $gasRequest->status != 'Pending' ? 'active' : '' }}"></div>
                        <div class="timeline-content">
                            <h6>Order Confirmed</h6>
                            <p class="text-muted">{{ $gasRequest->status != 'Pending' ? 'Confirmed' : 'Waiting for confirmation' }}</p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-dot {{ $gasRequest->status == 'Completed' ? 'active' : '' }}"></div>
                        <div class="timeline-content">
                            <h6>Order Completed</h6>
                            <p class="text-muted">{{ $gasRequest->status == 'Completed' ? 'Completed' : 'Waiting for completion' }}</p>
                        </div>
                    </div>
                </div>

                <div class="outlet-info p-3 bg-light rounded mb-4">
                    <h5>Outlet Information</h5>
                    <div class="row mt-3">
                        <div class="col-md-4 fw-bold">Outlet Name:</div>
                        <div class="col-md-8">{{ $gasRequest->outlet->name }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 fw-bold">Address:</div>
                        <div class="col-md-8">{{ $gasRequest->outlet->address }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 fw-bold">Contact:</div>
                        <div class="col-md-8">{{ $gasRequest->outlet->contact_number }}</div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('customer.dashboard') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
<style>
    .card {
        border-radius: 15px;
        border: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .order-timeline {
        position: relative;
        padding-left: 30px;
    }

    .timeline-item {
        position: relative;
        padding-bottom: 30px;
    }

    .timeline-item:last-child {
        padding-bottom: 0;
    }

    .timeline-item:before {
        content: "";
        position: absolute;
        left: -21px;
        top: 0;
        width: 2px;
        height: 100%;
        background-color: #dee2e6;
    }

    .timeline-item:last-child:before {
        height: 0;
    }

    .timeline-dot {
        position: absolute;
        left: -30px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #e9ecef;
        border: 3px solid #fff;
        box-shadow: 0 0 0 2px #dee2e6;
        z-index: 1;
    }

    .timeline-dot.active {
        background: #FFC107;
        box-shadow: 0 0 0 2px #FFC107;
    }

    .timeline-content {
        padding-bottom: 10px;
    }

    .timeline-content h6 {
        margin-bottom: 5px;
        font-weight: 600;
    }

    .timeline-content p {
        font-size: 0.9rem;
        margin-bottom: 0;
    }

    .outlet-info {
        border-left: 4px solid #FFC107;
    }

    .btn-warning {
        background: #FFC107;
        border: none;
        color: #2C3E50;
        font-weight: bold;
    }

    .btn-warning:hover {
        background: #FFA000;
        color: #2C3E50;
    }
</style>
@endsection
