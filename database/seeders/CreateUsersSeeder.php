<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'username'=>'Admin',
               'user_id'=>'dFg4s3aGs7',
               'name'=>'Admin User',
               'email'=>'a@a.com',
               'type'=>2,
               'password'=> bcrypt('123'),
            ],
            [
               'name'=>'Vet',
               'user_id'=>'5TEdg78fsE',
               'email'=>'v@v.com',
               'type'=> 1,
               'password'=> bcrypt('123'),
            ],
            [
               'name'=>'leexin',
               'user_id'=>'spO34fe5gM',
               'email'=>'b@b.com',
               'type'=>0,
               'password'=> bcrypt('123'),
            ],
            [
               'name'=>'User',
               'user_id'=>'sfa646HdaO',
               'email'=>'t@t.com',
               'type'=>0,
               'password'=> bcrypt('123'),
            ],
            [
               'name'=>'User',
               'user_id'=>'xXd456HuUQ',
               'email'=>'x@x.com',
               'type'=>0,
               'password'=> bcrypt('123'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}