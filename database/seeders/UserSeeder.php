<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'student_name'=>'تالا',
            'university_id'=>'2018298745',
            'college'=>'كلية العلوم التطبيقية',
            'majoring'=>'الحوسبة التطبيقية',
            'phone'=>'0598456872',
            'address'=>'نابلس _ رافيديا',
            'email'=>'tala@gmail.com',
            'password'=>Hash::make('123456789')
            
        ]);
        User::create([
            'student_name'=>'سوار',
            'university_id'=>'2018435678',
            'college'=>'كلية العلوم التطبيقية',
            'majoring'=>'الحوسبة التطبيقية',
            'phone'=>'05982456872',
            'address'=>'نابلس _ رافيديا',
            'email'=>'sewar@gmail.com',
            'password'=>Hash::make('987654321'),
            
        ]);
 
    }
}
