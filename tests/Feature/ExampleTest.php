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
            User::factory()->create();
        }
        $count = User::get()->count();
        $user = User::find(rand(1, $count));
        $data = $user->toArray();
        print_r($data);

        $this->assertDatabaseHas('users', $data);

        $user->delete();
        $this->assertDatabaseMissing('users', $data);

    }
}
