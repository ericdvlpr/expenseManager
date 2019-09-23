<?php

use Illuminate\Database\Seeder;
use App\ExpenseCategory;
class ExpenseCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExpenseCategory::truncate();

        ExpenseCategory::create(['name' => 'Travel', 'description'=>'Lorem']);
        ExpenseCategory::create(['name' => 'Food', 'description'=>'ipsum']);
        
    }
}
