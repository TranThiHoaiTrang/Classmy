<?php namespace Database\Seeders;

use Foostart\Category\Helpers\FoostartSeeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClassmySeeder extends FoostartSeeder
{

    public function __construct() {
        // Table name
        $this->table = 'Classmy';
        // Prefix column
        $this->prefix_column = 'Classmy_';
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create context for user/level
        DB::table('Classmy')->insert([
            $this->prefix_context . 'name' => 'Admin Classmy',
            $this->prefix_context . 'key' => 'ab7e417e2dddc5240b586d454e',
            $this->prefix_context . 'ref' => 'admin/Classmy',
            'status' => 99,
            'created_user_id' => 1,
            'updated_user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        //Create context for user/level
        DB::table('Classmy')->insert([
            $this->prefix_context . 'name' => 'Admin slideshows',
            $this->prefix_context . 'key' => 'ab7e417e2dddc5e5240b586d454f',
            $this->prefix_context . 'ref' => 'admin/slideshows',
            'status' => 99,
            'created_user_id' => 1,
            'updated_user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
