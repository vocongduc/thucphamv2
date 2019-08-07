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
        // $this->call(UsersTableSeeder::class);
        
        $location = "Cộng tác viên,Quản trị viên,Admin";
        $explode = explode(',',$location);
        foreach($explode as $ex)
        {
            DB::table('role')->insert([
                'name' => $ex
            ]);
        }
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'status' => '1',
            'level' => '3',
            'created_at' => now(),
            'password' => bcrypt('12345678') // password :12345678
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'status' => '1',
            'email_verified_at' => now(),
            'created_at' => now(),
            'password' => bcrypt('12345678'), // password :12345678
        ]);
        // contact infor comny
        DB::table('change_contacts')->insert([
            'name' =>'CÔNG TY THỰC PHẨM SẠCH MYTAMMART VIỆT NAM',
            'phone' =>'0967.26.88.26',
            'address' =>'A11, Ngõ 100, Đường Trung Kính, Phường Yên Hòa, Quận Cầu Giấy ',
            'certificate' =>'0104567410 do sở kế hoạch và đầu tư Thành phố Hà Nội cấp ngày 14',
            'email' =>'cskh@mytammart.vn',
            'fblink' =>'http://www.facebook.com/mytammart.com.vn',
            'website' =>'http://www.mytammart.vn'
        ]);
        DB::table('cate_news')->insert([
            'name'=>'Kiến thức',
            'slug'=>'kien-thuc',
            'created_at'=>now(),
        ]);
        

    }
}
