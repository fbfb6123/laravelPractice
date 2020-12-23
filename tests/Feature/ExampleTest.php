<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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
            'id' => 1,
            'name' => 'ikeda',
            'email' => 'ikeda@ikeda',
            'age' => '24'
        ];

        $this->assertDatabaseHas('people', $data);

        $data['id'] =2;
        $this->assertDatabaseMissing('people', $data);



    }
}
