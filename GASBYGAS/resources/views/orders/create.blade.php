@extends('layouts.customer')

@section('title', 'Place Order - GasByGas')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="form-card p-4">
                <h3 class="mb-4 text-center">Gas Cylinder Request</h3>

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- User Information Banner -->
                <div class="user-info-banner">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h5 class="mb-0">
                                <i class="fas fa-user-circle me-2"></i>
                                {{ Auth::user()->name }}
                            </h5>
                            <small>{{ Auth::user()->role === 'business_customer' ? 'Business Account' : 'Personal Account' }}</small>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="remaining-orders">
                                @if(Auth::user()->role === 'business_customer')
                                    <span>{{ 100 - $pendingOrdersCount }} of 100</span> pending orders remaining
                                @else
                                    @if($pendingOrdersCount > 0)
                                        <span class="text-danger">You have an existing pending order</span>
                                    @else
                                        <span class="text-success">You can place an order</span>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Information Banner -->
                <div class="info-banner">
                    <i class="fas fa-info-circle me-2"></i>
                    @if(Auth::user()->role === 'business_customer')
                        As a business customer, you can have up to 100 pending orders at any time.
                    @else
                        As a personal customer, you can have only 1 pending order at a time.
                    @endif
                </div>

                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <!-- Delivery Information Section -->
                    <div class="form-group mb-3">
                        <label>Gas Type</label>
                        <select name="gas_type_id" class="form-control @error('gas_type_id') is-invalid @enderror" required>
                            <option value="">Select Gas Type</option>
                            @foreach($gasTypes as $gasType)
                                <option value="{{ $gasType->id }}" {{ old('gas_type_id') == $gasType->id ? 'selected' : '' }}>
                                    {{ $gasType->name }} - {{ number_format($gasType->price, 2) }} LKR ({{ $gasType->weight }} kg)
                                </option>
                            @endforeach
                        </select>
                        @error('gas_type_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Outlet</label>
                        <select name="outlet_id" class="form-control @error('outlet_id') is-invalid @enderror" required>
                            <option value="">Select Outlet</option>
                            @foreach($outlets as $outlet)
                                <option value="{{ $outlet->id }}"
                                    {{ old('outlet_id') == $outlet->id ? 'selected' : '' }}
                                    {{ !$outlet->has_stock || !$outlet->is_accepting_orders ? 'disabled' : '' }}>
                                    {{ $outlet->name }}
                                    @if(!$outlet->has_stock)
                                        (Out of Stock)
                                    @elseif(!$outlet->is_accepting_orders)
                                        (Not Accepting Orders)
                                    @endif
                                </option>
                            @endforeach
                        </select>
                        @error('outlet_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                               min="1" max="{{ Auth::user()->role === 'business_customer' ? '20' : '2' }}"
                               value="{{ old('quantity', 1) }}" required>
                        <div class="quantity-warning">
                            @if(Auth::user()->role === 'business_customer')
                                Business customers can request up to 20 cylinders per order.
                            @else
                                Personal customers can request up to 2 cylinders per order.
                            @endif
                        </div>
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Special Instructions (Optional)</label>
                        <textarea name="special_instructions" class="form-control @error('special_instructions') is-invalid @enderror"
                                  maxlength="255" rows="3">{{ old('special_instructions') }}</textarea>
                        @error('special_instructions')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox" name="terms" id="terms" required>
                        <label class="form-check-label" for="terms">
                            I agree to bring my empty cylinder(s) and make the payment when requested
                        </label>
                        @error('terms')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('customer.dashboard') }}" class="btn btn-outline-secondary">Back to Dashboard</a>
                        <button type="submit" class="btn btn-primary"
                                {{ (Auth::user()->role === 'business_customer' && $pendingOrdersCount >= 100) ||
                                   (Auth::user()->role !== 'business_customer' && $pendingOrdersCount >= 1) ? 'disabled' : '' }}>
                            Submit Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    :root {
        --primary-yellow: #FFC107;
        --secondary-yellow: #FFD54F;
        --dark-yellow: #FFA000;
        --light-yellow: #FFF3E0;
    }

    body {
        background: var(--light-yellow);
        font-family: 'Poppins', sans-serif;
    }

    .form-card {
        background: white;
        border-radius: 15px;
        border: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        animation: slideIn 0.5s ease-out;
    }

    .form-control, .form-select {
        border-radius: 10px;
        border: 2px solid #eee;
        padding: 12px;
        transition: all 0.3s;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary-yellow);
        box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
    }

    .btn-primary {
        background: var(--primary-yellow);
        border: none;
        padding: 12px 30px;
        border-radius: 10px;
        color: #2C3E50;
        font-weight: bold;
        transition: all 0.3s;
    }

    .btn-primary:hover {
        background: var(--dark-yellow);
        transform: translateY(-2px);
    }

    .section-title {
        color: #2C3E50;
        border-bottom: 2px solid var(--primary-yellow);
        padding-bottom: 8px;
        margin-bottom: 20px;
    }

    .token-card {
        background: var(--light-yellow);
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
    }

    .user-info-banner {
        background: var(--primary-yellow);
        color: #2C3E50;
        border-radius: 10px;
        padding: 10px 15px;
        margin-bottom: 20px;
    }

    .remaining-orders {
        font-weight: bold;
        font-size: 1.1em;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .info-banner {
        background-color: rgba(255, 193, 7, 0.2);
        border-left: 4px solid var(--primary-yellow);
        padding: 10px 15px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .quantity-warning {
        font-size: 0.85em;
        color: #6c757d;
        margin-top: 5px;
    }
</style>
@endsection
