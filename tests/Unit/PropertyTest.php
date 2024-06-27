<?php

namespace Tests\Unit;

use App\Http\Filters\PropertyFilter;
use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function can_create_property()
    {
        $propertyData = [
            'name' => 'The Victoria',
            'price' => 374662,
            'bedroom_count' => 4,
            'bathroom_count' => 2,
            'storey_count' => 2,
            'garage_count' => 2,
        ];

        Property::create($propertyData);

        $this->assertDatabaseHas(Property::class, $propertyData);
    }

    #[Test]
    public function can_apply_filter_scope(): void
    {
        $properties = Property::factory()->count(5)->create();

        $targetProperty = Property::create([
            'name' => 'The Victoria',
            'price' => 374662,
            'bedroom_count' => 4,
            'bathroom_count' => 2,
            'storey_count' => 2,
            'garage_count' => 2,
        ]);

        $request = app()->make(Request::class);

        $request->offsetSet('name', 'The Vic');

        $filter = new PropertyFilter($request);

        $filteredProperties = Property::filter($filter)->get();

        $this->assertFalse($filteredProperties->pluck('id')->contains($properties->pluck('id')->toArray()));
        $this->assertTrue($filteredProperties->pluck('id')->contains($targetProperty->id));
    }
}
