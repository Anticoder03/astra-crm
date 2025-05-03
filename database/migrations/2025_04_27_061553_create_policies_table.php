<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliciesTable extends Migration
{
    public function up(): void
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade'); // Foreign key to customers table
            $table->string('policy_name');
            $table->string('policy_number')->unique();
            $table->decimal('sum_assured', 12, 2);
            $table->decimal('premium_amount', 12, 2);
            $table->enum('premium_type', ['Monthly', 'Quarterly', 'Yearly']);
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['Active', 'Matured', 'Cancelled']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('policies');
    }
}
