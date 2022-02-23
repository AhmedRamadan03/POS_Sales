<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients =  ['ahmed', 'ali'];
        foreach($clients as $client){
            Client::create([
                'name'      =>$client,
                'phone'     =>  '01270122393',
                'address'   =>  'egypt',
            ]);
        }
    }
}
