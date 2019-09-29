<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AirportListsSeeder::class);
        // $this->call(ActionSeeder::class);
         $this->call(DepartmentSeeder::class);
         $this->call(UserSeeder::class);
         $this->call(ServiceTypeSeeder::class);
         $this->call(ServiceSeeder::class);
         $this->call(CountrySeeder::class);
         $this->call(CurrencySeeder::class);
         $this->call(VendorPaymentModeSeeder::class);
         $this->call(RequestStatusSeeder::class);
         $this->call(ClassOfTravelSeeder::class);
         $this->call(PaymentMethodSeeder::class);
         $this->call(RequestSeeder::class);
         $this->call(VendorListSeeder::class);
         $this->call(TitleSeeder::class);
         $this->call(BlogCategorySeeder::class);
         $this->call(BlogSeeder::class);
         $this->call(TestimonialSeeder::class);
         $this->call(AirportServedListSeeder::class);
         $this->call(SubscriptionSeeder::class);
    }
}
