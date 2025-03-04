<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class TestSmsCommand extends Command
{
    protected $signature = 'test:user-sms {userId} {message?}';
    protected $description = 'Test SMS to a specific user';

    public function handle()
    {
        $userId = $this->argument('userId');
        $message = $this->argument('message') ?? 'Test message from GasByGas ' . now()->format('Y-m-d H:i:s');

        // Get the user
        $user = User::find($userId);

        if (!$user) {
            $this->error("User with ID {$userId} not found!");
            return 1;
        }

        if (!$user->phone) {
            $this->error("User with ID {$userId} doesn't have a phone number!");
            return 1;
        }

        $this->info("Testing SMS gateway...");
        $this->info("User: {$user->name} (ID: {$user->id})");
        $this->info("Sending to: {$user->phone}");
        $this->info("Message: {$message}");

        try {
            $username = 'admin';
            $password = 'password';
            $url = 'http://192.168.8.123:8888/send-message';

            // The SMS gateway expects JSON format
            $jsonData = json_encode([
                'phoneNumber' => $user->phone,
                'message' => $message
            ]);

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($jsonData)
            ]);
            curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);

            $response = curl_exec($ch);
            $info = curl_getinfo($ch);
            $error = curl_error($ch);

            $this->info('Status Code: ' . $info['http_code']);
            $this->info('Response: ' . $response);

            if ($error) {
                $this->error('cURL Error: ' . $error);
            }

            curl_close($ch);

            if ($info['http_code'] >= 200 && $info['http_code'] < 300) {
                $this->info('SMS test was successful!');
            } else {
                $this->error('SMS test failed with status code: ' . $info['http_code']);
            }
        } catch (\Exception $e) {
            $this->error('Exception: ' . $e->getMessage());
        }

        return 0;
    }
}
