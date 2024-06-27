<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    #[Test]
    public function can_get_success_response(): void
    {
        $response = $this->get('/api/v1/properties');

        $response->assertStatus(200);
    }

    #[Test]
    public function can_filter_properties_by_name(): void
    {
        $response = $this->get('/api/v1/properties?name=The Vic*');

        $response->assertStatus(200)
            ->assertJsonFragment([
                'name' => 'The Victoria',
                'price' => "374662.00"
            ])->assertJsonMissing([
                'name' => 'The Xavier',
                'price' => "513268.00",
            ]);
    }

    #[Test]
    public function can_filter_properties_by_price(): void
    {
        $response = $this->get('/api/v1/properties?price=200000,300000');

        $response->assertStatus(200)
            ->assertJsonFragment([
                'name' => 'The Skyscape',
                'price' => "263604.00",
            ])->assertJsonMissing([
                'name' => 'The Xavier',
                'price' => "513268.00",
            ]);
    }

    // more tests can be added here but for sake of time
}
