<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\RegionalZones;

class RegionalZonesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_regional_zones()
    {
        $regionalZones = factory(RegionalZones::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/regional_zones', $regionalZones
        );

        $this->assertApiResponse($regionalZones);
    }

    /**
     * @test
     */
    public function test_read_regional_zones()
    {
        $regionalZones = factory(RegionalZones::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/regional_zones/'.$regionalZones->id
        );

        $this->assertApiResponse($regionalZones->toArray());
    }

    /**
     * @test
     */
    public function test_update_regional_zones()
    {
        $regionalZones = factory(RegionalZones::class)->create();
        $editedRegionalZones = factory(RegionalZones::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/regional_zones/'.$regionalZones->id,
            $editedRegionalZones
        );

        $this->assertApiResponse($editedRegionalZones);
    }

    /**
     * @test
     */
    public function test_delete_regional_zones()
    {
        $regionalZones = factory(RegionalZones::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/regional_zones/'.$regionalZones->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/regional_zones/'.$regionalZones->id
        );

        $this->response->assertStatus(404);
    }
}
