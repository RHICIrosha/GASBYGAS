<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gas_requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_number')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('gas_type_id');
            $table->unsignedBigInteger('outlet_id');
            $table->integer('quantity')->default(1);  // Add quantity here without 'after'
            $table->string('status')->default('Pending');
            $table->text('notes')->nullable();
            $table->boolean('empty_cylinder_received')->default(false);
            $table->boolean('payment_received')->default(false);
            $table->decimal('amount', 10, 2);
            $table->date('expected_pickup_date')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('gas_type_id')->references('id')->on('gas_types')->onDelete('cascade');
            $table->foreign('outlet_id')->references('id')->on('outlets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gas_requests');
    }
};
