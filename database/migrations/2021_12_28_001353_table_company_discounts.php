<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableCompanyDiscounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_discounts', function (Blueprint $table) {
            $table->id();
            $table->index(['company_id', 'discount_id'], 'company_discount');
            $table->unique(['company_id', 'discount_id']);
            $table->foreignId('company_id')->references('id')->on('companies');
            $table->foreignId('discount_id')->references('id')->on('discounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_discounts');
    }
}
