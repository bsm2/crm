<?php

namespace Tests\Unit;

use App\Http\Middleware\Admin;
use App\Models\ContactPerson;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Http\Request;

class BasicTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_login_form()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_register_form()
    {
        $response = $this->get('/register');
        $response->assertStatus(404);
    }

    public function test_user_duplicate()
    {
        $firstUser=User::make([
            "name"=>"first",
            'email'=>'first@mail.com',
            'role'=>'admin'
        ]);
        $secondUser=User::make([
            'name'=>'second',
            'email'=>'second@mail.com',
            'role'=>'admin'
        ]);
        $this->assertTrue($firstUser->email != $secondUser->email);
    }

    public function test_delete_user(Type $var = null)
    {
        $user=User::make([
            'name'=>'second',
            'email'=>'second@mail.com',
            'role'=>'admin'
        ]);
        if ($user) {
            $user->delete();
        }
        $this->assertTrue(true);
    }

    public function test_first_admin()
    {
        $this->assertDatabaseHas('users',[
            'email'=>'admin@admin.com'
        ]);
    }

    public function test_admin_middleware()
    {
        $user = User::make([
            "name"=>"first",
            'email'=>'first@mail.com',
            'role' => 'user'
        ]);

        $this->actingAs($user);

        $request = Request::create('/admin', 'GET');

        $middleware = new Admin;

        $response = $middleware->handle($request, function () {});

        $this->assertEquals($response->getStatusCode(), 302);
    }



    public function test_contact_person_created_successfully()
    {
        $user = User::make([
            "name"=>"first",
            'email'=>'first@mail.com',
            'role' => 'user'
        ]);
        $this->actingAs($user);

        $contactPerson=[
            "first_name"=>"first",
            "last_name"=>"last",
            "company_id"=>"2",
            'email'=>'first700@mail.com',
            'phone' => '0123456789',
            'linkedin_url'=>'https://github.com/bsm2/crm',
        ];


        $this->json('POST', 'api/dashboard/contactPerson',$contactPerson, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "sucess"=>true,
                "status"=>200,
                "message"=>"new contact successfully added",
                "data" => [
                    "first_name"=>"first",
                    "last_name"=>"last",
                    "company_id"=> "2",
                    'email'=>'first700@mail.com',
                    'phone' => '0123456789',
                    'linkedin_url'=>'https://github.com/bsm2/crm',
                ],
            ]);
    }
}
