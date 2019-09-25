<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serviceCode',10);
            $table->unsignedBigInteger('agent_id')->unsigned()->nullable();//
            $table->float('vendorAmount', 8, 2)->nullable();
            $table->string('greeterName',50)->nullable();
            $table->string('pickOrDropAddress',100)->nullable();
            $table->timestamp('departureDate')->nullable();
            $table->string('lastName',100)->nullable();
            $table->unsignedBigInteger('vendor_payment_mode_id')->unsigned()->nullable(); //
            $table->string('departureTime',20)->nullable();
            $table->unsignedBigInteger('vendor_list_id')->unsigned()->nullable();//
            $table->string('titleName',10)->nullable();
            $table->integer('countryCode')->nullable();
            $table->string('originAirport')->nullable();
            $table->unsignedBigInteger('request_status_id')->unsigned()->nullable();//
            $table->boolean('isRepeat')->nullable();
            $table->boolean('isPickup')->nullable();
            $table->string('invoiceRemarks')->nullable();
            $table->unsignedBigInteger('user_id')->unsigned()->nullable(); //
            $table->string('arrivalTime')->nullable();
            $table->text('message')->nullable();
            $table->unsignedBigInteger('payment_method_id')->unsigned()->nullable(); //
            $table->timestamp('arrivalDate')->nullable();
            $table->string('companyName',150)->nullable();
            $table->unsignedBigInteger('classOfTravel_id')->unsigned()->nullable(); //
            $table->string('contactNumber',20)->nullable();
            $table->unsignedBigInteger('respondedBy')->unsigned()->nullable();//
            $table->string('transitFlightNumber',50)->nullable();
            $table->integer('infants')->nullable();
            $table->string('invoiceNumber',100)->nullable();
            $table->unsignedBigInteger('service_type_id')->unsigned()->nullable();//
            $table->string('adminComment')->nullable();
            $table->unsignedBigInteger('currency_id')->unsigned()->nullable();//
            $table->string('greeterContactNumber',20)->nullable();
            $table->boolean('isDelete')->nullable();
            $table->float('creditcardCharges',8,2)->nullable();
            $table->boolean('feedbackStatus')->nullable();
            $table->unsignedBigInteger('vendorCurrency_id')->unsigned()->nullable();//
            $table->integer('adults')->nullable();
            $table->string('flightNumber',50)->nullable();
            $table->string('firstName')->nullable();
            $table->string('campaignName',100)->nullable();
            $table->float('totalAmount',8,2)->nullable();
            $table->unsignedBigInteger('paymentDetails_id')->unsigned()->nullable();//
            $table->string('email',50)->nullable();
            $table->unsignedBigInteger('service_id')->unsigned()->nullable();//
            $table->integer('children')->nullable();
            $table->string('domainName',100)->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->foreign('agent_id')->references('id')->on('users');
            $table->foreign('vendor_payment_mode_id')->references('id')->on('vendor_payment_modes');
            $table->foreign('vendor_list_id')->references('id')->on('vendor_lists');
            $table->foreign('respondedBy')->references('id')->on('users');
            $table->foreign('service_type_id')->references('id')->on('service_types');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('vendorCurrency_id')->references('id')->on('currencies');
            $table->foreign('paymentDetails_id')->references('id')->on('payment_details');
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('request_status_id')->references('id')->on('request_status');
            $table->foreign('classOfTravel_id')->references('id')->on('class_of_travels');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
