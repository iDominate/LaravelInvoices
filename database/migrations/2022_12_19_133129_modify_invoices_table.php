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
        Schema::table('invoices', function (Blueprint $table) {
            $table->decimal('discount', 9,2)->change();
            $table->decimal('rate_vat',5.2)->change();
            $table->decimal('commission_amount', 8,2)->nullable();
            $table->decimal('collection_amount', 8, 2);
            $table->renameColumn('product', 'product_name');
            $table->renameColumn('section', 'section_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('discount')->change();
            $table->string('rate_vat')->change();

        });
        Schema::dropColumns('invoices',['commission_amount', 'collection_amount']);
    }
};
