<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddReceiverIdFieldToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_add_receiver_id_field_to_messages', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->timestamps();
            $table->integer('receiver_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_add_receiver_id_field_to_messages');
         // $table->dropColumn('receiver_id');
    }
}
