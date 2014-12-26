<?php 

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert(array(
            array('name'=>'Sheldon Tan','email'=>'sheldon@codesmith.sg','password'=>Hash::make('qwe'),'role'=>'1'),
            array('name'=>'Dave Quah','email'=>'dave@codesmith.sg','password'=>Hash::make('qwerty'),'role'=>'1')
            ));
    }

}