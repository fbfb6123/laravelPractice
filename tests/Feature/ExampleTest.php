<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Person;
use Illuminate\Support\Facades\DB;


class ExampleTest extends TestCase
{


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $data = [
            'id' => 4,
            'name' => 'tomita',
            'email' => 'tomita@tomita',
            'age' => '25',
        ];

        $person = new Person();
        $person->fill($data)->save();
        $this->assertDatabaseHas('people', $data);

        $person->name ='TOMIY';
        $person->save();
        $this->assertDatabaseMissing('people', $data);
        $data['name'] = 'TOMIY';
        $this->assertDatabaseHas('people', $data);

        $person->delete();
        $this->assertDatabaseMissing('people', $data);



    }
}
