<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Zones;

class ZonesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_zones()
    {
        $zones = factory(Zones::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/zones', $zones
        );

        $this->assertApiResponse($zones);
    }

    /**
     * @test
     */
    public function test_read_zones()
    {
        $zones = factory(Zones::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/zones/'.$zones->id
        );

        $this->assertApiResponse($zones->toArray());
    }

    /**
     * @test
     */
    public function test_update_zones()
    {
        $zones = factory(Zones::class)->create();
        $editedZones = factory(Zones::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/zones/'.$zones->id,
            $editedZones
        );

        $this->assertApiResponse($editedZones);
    }

    /**
     * @test
     */
    public function test_delete_zones()
    {
        $zones = factory(Zones::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/zones/'.$zones->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/zones/'.$zones->id
        );

        $this->response->assertStatus(404);
    }
}
