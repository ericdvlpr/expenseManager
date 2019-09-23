<?php

use Illuminate\Database\Seeder;
use App\Expense;
class ExpenseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Expense::truncate();

        Expense::create(['expense_category' => 'Travel', 'amount'=>1000,'entry_date'=>'2019-09-22']);
        Expense::create(['expense_category' => 'Food', 'amount'=>1000,'entry_date'=>'2019-09-22']);
      
    }
}
