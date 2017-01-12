<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
class LoginTest extends TestCase
{
    use DatabaseTransactions;
    public function testLogin(){
        $user = factory(User::class)->create(['email'=>'unittest@mail.com','password'=>bcrypt('123456')]);

        $data = [
            '_token' => csrf_token(),
            'email' => 'unittest@mail.com',
            'password' => '123456'
        ];

        $this->json('POST', '/login',$data);
        $this->assertResponseStatus(302);

    }
}
