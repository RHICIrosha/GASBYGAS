<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GasByGas - Verify Phone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f7d44a, #f8a427);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .verification-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 450px;
            animation: slideIn 0.5s ease-out;
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

        .verification-header {
            background: linear-gradient(135deg, #f7d44a, #f8a427);
            padding: 2rem;
            color: white;
            text-align: center;
        }

        .verification-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .verification-body {
            padding: 2rem;
        }

        .form-control-lg {
            letter-spacing: 0.5em;
            font-size: 1.5rem;
            text-align: center;
        }

        .form-control:focus {
            border-color: #f8a427;
            box-shadow: 0 0 0 0.25rem rgba(248, 164, 39, 0.25);
        }

        .btn-verify {
            background: linear-gradient(135deg, #f7d44a, #f8a427);
            border: none;
            padding: 0.8rem;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-verify:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(248, 164, 39, 0.3);
        }

        .btn-link {
            color: #f8a427;
            text-decoration: none;
        }

        .btn-link:hover {
            color: #d58e23;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="verification-container">
        <div class="verification-header">
            <i class="fas fa-mobile-alt verification-icon"></i>
            <h2>Verify Your Phone</h2>
            <p>Enter the verification code sent to your phone</p>
        </div>
        <div class="verification-body">
            @if(session('message'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="text-center mb-4">
                <p>We've sent a 6-digit verification code to your phone number <strong>{{ substr($user->phone, 0, 4) . '****' . substr($user->phone, -4) }}</strong></p>
                <p class="small text-muted">The code will expire in 10 minutes</p>
            </div>

            <form method="POST" action="{{ route('verification.verify') }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">

                <div class="mb-4">
                    <input id="code" type="text" class="form-control form-control-lg @error('code') is-invalid @enderror"
                           name="code" placeholder="------" maxlength="6" required autofocus
                           oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-verify btn-lg">
                        Verify Now
                    </button>
                </div>
            </form>

            <div class="text-center mt-4">
                <p>Didn't receive the code?</p>
                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-link">
                        Resend verification code
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
