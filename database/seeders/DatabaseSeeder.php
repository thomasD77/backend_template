<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call([
            AddressesTableSeeder::class,
            BillingsTableSeeder::class,
            BillingsTableSeeder::class,
            LoyalsTableSeeder::class,
            PostCategoriesTableSeeder::class,
            PostsTableSeeder::class,
            PromosTableSeeder::class,
            RepliesTableSeeder::class,
            ReviewsTableSeeder::class,
            ServiceCategoriesTableSeeder::class,
            ServicesTableSeeder::class,
            SourcesTableSeeder::class,
            StatusesTableSeeder::class,
            SubmissionsTableSeeder::class,
            StatusesTableSeeder::class,
            TestimonialsTableSeeder::class,
            UsersTableSeeder::class,
            LocationsTableSeeder::class,
        ]);
    }
}
