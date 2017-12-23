<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json('GET', '/data');

        $response
        ->assertStatus(200)
        ->assertJson([
        	'item1' => 'apple',
			'item3' => 'shirt',
        ]);


    }
}
