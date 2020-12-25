<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Person;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;


class ExampleTest extends TestCase
{


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        for($i = 0;$i < 100;$i++)
        {
            Person::factory()->create();
        }
        $count = Person::get()->count();
        $person = Person::find(rand(1, $count));
        $data = $person->toArray();
        print_r($data);

        $this->assertDatabaseHas('people', $data);

        $person->delete();
        $this->assertDatabaseMissing('people', $data);



        //テストコード
        $this->get('/')->aseertStatus(200);

        $this->get('/hello')->assertOk();

        $this->post('/hello')->assertOk();

        $this->get('/hello/1')->assertOk();

        $this->get('/hoge')->assertOk(404);

        $this->get('/hello/1')->assertSeeText('Index');

        $this->get('/hello/1')->assertSee('<h1>');

        $this->get('/hello/1')->assertSeeOrder(['<html','<head','<body','<h1>']);

        $this->get('/hello/json/1')->assertSeeText('YAMADA');

        $this->get('/hello/json/1')->assertExactjson(['id'=>2,'name'=>'HANAKO','mail'=>'hanako@flower','age'=>'19',
        'created_at'=>'2019-05-16 02:10:10','updated_at'=>'2019-05-16 02:10:10']);


    }
}
