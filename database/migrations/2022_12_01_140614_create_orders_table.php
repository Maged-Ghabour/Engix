<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->string('customer_mobile')->nullable();
            $table->string('order_number')->nullable();
            $table->date('order_date')->nullable();
            $table->decimal('total', 8, 2)->default(0.00);
            // Add to handle Order from side of User
            $table->foreignId("user_id")->nullable()->constrained("users")->nullOnDelete();
            $table->string("number")->unique(); // Shape of order
            $table->enum("status", ["pending", "delivering", "completed", "cancelled", "refunded"])->default("pending");
            $table->string("payment_method")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
