<!DOCTYPE html>
<html>
<head>
    <title>GasByGas - Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-yellow-400 bg-gradient-to-r from-yellow-400 to-yellow-500">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold text-yellow-500">Create Account</h2>
                <p class="text-gray-600">Join GasByGas today</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Account Type Tabs -->
            <div class="flex mb-6 border-b">
                <button type="button" id="personal-tab"
                        class="py-2 px-4 text-center border-b-2 border-yellow-500 text-yellow-500 font-bold focus:outline-none"
                        onclick="switchTab('personal')">
                    Personal Account
                </button>
                <button type="button" id="business-tab"
                        class="py-2 px-4 text-center border-b-2 border-transparent text-gray-500 focus:outline-none"
                        onclick="switchTab('business')">
                    Business Account
                </button>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="hidden" id="user_type" name="user_type" value="customer">

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Name
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                           id="name" type="text" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                           id="email" type="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                        Phone
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                           id="phone" type="text" name="phone" value="{{ old('phone') }}" placeholder="+94XXXXXXXXX" required>
                    <p class="text-xs text-gray-500 mt-1">Format: +94XXXXXXXXX</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nic">
                        NIC
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                           id="nic" type="text" name="nic" value="{{ old('nic') }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                        Address
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                           id="address" name="address" rows="2" required>{{ old('address') }}</textarea>
                </div>

                <!-- Business specific fields, hidden by default -->
                <div id="business-fields" class="hidden">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="business_name">
                            Business Name
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                               id="business_name" type="text" name="business_name" value="{{ old('business_name') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="registration_number">
                            Business Registration Number
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                               id="registration_number" type="text" name="registration_number" value="{{ old('registration_number') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="business_address">
                            Business Address
                        </label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                               id="business_address" name="business_address" rows="2">{{ old('business_address') }}</textarea>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                           id="password" type="password" name="password" required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
                        Confirm Password
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                           id="password_confirmation" type="password" name="password_confirmation" required>
                </div>

                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-yellow-500" required>
                        <span class="ml-2 text-gray-700 text-sm">I agree to the Terms and Conditions</span>
                    </label>
                </div>

                <div class="mb-6">
                    <button class="w-full bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105"
                            type="submit">
                        Create Account
                    </button>
                </div>

                <div class="text-center mt-6">
                    <p class="text-gray-600">Already have an account?
                        <a class="text-yellow-500 hover:text-yellow-700 font-bold"
                           href="{{ route('login') }}">
                            Login
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script>
        function switchTab(tabType) {
            const businessFields = document.getElementById('business-fields');
            const userTypeInput = document.getElementById('user_type');

            if (tabType === 'personal') {
                // Update user_type field
                userTypeInput.value = 'customer';

                // Update tab styles
                document.getElementById('personal-tab').classList.add('border-yellow-500', 'text-yellow-500', 'font-bold');
                document.getElementById('personal-tab').classList.remove('border-transparent', 'text-gray-500');
                document.getElementById('business-tab').classList.add('border-transparent', 'text-gray-500');
                document.getElementById('business-tab').classList.remove('border-yellow-500', 'text-yellow-500', 'font-bold');

                // Hide business fields
                businessFields.classList.add('hidden');

                // Make business fields not required
                document.getElementById('business_name').removeAttribute('required');
                document.getElementById('registration_number').removeAttribute('required');
                document.getElementById('business_address').removeAttribute('required');

            } else {
                // Update user_type field
                userTypeInput.value = 'business';

                // Update tab styles
                document.getElementById('business-tab').classList.add('border-yellow-500', 'text-yellow-500', 'font-bold');
                document.getElementById('business-tab').classList.remove('border-transparent', 'text-gray-500');
                document.getElementById('personal-tab').classList.add('border-transparent', 'text-gray-500');
                document.getElementById('personal-tab').classList.remove('border-yellow-500', 'text-yellow-500', 'font-bold');

                // Show business fields
                businessFields.classList.remove('hidden');

                // Make business fields required
                document.getElementById('business_name').setAttribute('required', 'required');
                document.getElementById('registration_number').setAttribute('required', 'required');
                document.getElementById('business_address').setAttribute('required', 'required');
            }
        }

        // Check if we need to initialize the business tab (e.g., on form validation error)
        document.addEventListener('DOMContentLoaded', function() {
            const userTypeValue = "{{ old('user_type') }}";
            if (userTypeValue === 'business') {
                switchTab('business');
            }
        });
    </script>
</body>
</html>
