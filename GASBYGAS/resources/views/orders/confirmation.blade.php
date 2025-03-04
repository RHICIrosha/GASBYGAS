@extends('layouts.Customer')

@section('title', 'Order Confirmation - GasByGas')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card p-4">
                <div class="text-center mb-4">
                    <i class="fas fa-check-circle text-success" style="font-size: 5rem;"></i>
                    <h3 class="mt-3">Order Placed Successfully!</h3>
                    <p class="lead">Thank you for your order. Your request has been received and is now being processed.</p>
                </div>

                <div class="card border-warning mb-4">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">Order Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6 text-start">Request Number:</div>
                            <div class="col-6 text-start fw-bold">{{ $gasRequest->request_number }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 text-start">Token Number:</div>
                            <div class="col-6 text-start fw-bold">{{ $token->token_number }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 text-start">Gas Type:</div>
                            <div class="col-6 text-start">{{ $gasRequest->gasType->name }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 text-start">Quantity:</div>
                            <div class="col-6 text-start">{{ $gasRequest->quantity }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 text-start">Outlet:</div>
                            <div class="col-6 text-start">{{ $gasRequest->outlet->name }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 text-start">Valid Until:</div>
                            <div class="col-6 text-start">{{ $token->valid_until->format('d M, Y') }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 text-start">Amount:</div>
                            <div class="col-6 text-start">Rs. {{ number_format($gasRequest->amount, 2) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-start">Status:</div>
                            <div class="col-6 text-start">
                                <span class="badge bg-warning text-dark">{{ $gasRequest->status }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-info">
                    <h5><i class="fas fa-info-circle me-2"></i>What's Next?</h5>
                    <ol class="mb-0">
                        <li>Wait for a confirmation SMS when your gas is ready for pickup</li>
                        <li>Visit the outlet with your empty cylinder(s) and payment</li>
                        <li>Present your token number to collect your gas cylinder(s)</li>
                    </ol>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('customer.dashboard') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-home me-2"></i>Return to Dashboard
                    </a>
                    <a href="{{ route('orders.track', $gasRequest->id) }}" class="btn btn-warning">
                        <i class="fas fa-map-marker-alt me-2"></i>Track Order
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
