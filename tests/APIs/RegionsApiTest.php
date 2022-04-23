<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Regions;

class RegionsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_regions()
    {
        $regions = factory(Regions::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/regions', $regions
        );

        $this->assertApiResponse($regions);
    }

    /**
     * @test
     */
    public function test_read_regions()
    {
        $regions = factory(Regions::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/regions/'.$regions->id
        );

        $this->assertApiResponse($regions->toArray());
    }

    /**
     * @test
     */
    public function test_update_regions()
    {
        $regions = factory(Regions::class)->create();
        $editedRegions = factory(Regions::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/regions/'.$regions->id,
            $editedRegions
        );

        $this->assertApiResponse($editedRegions);
    }

    /**
     * @test
     */
    public function test_delete_regions()
    {
        $regions = factory(Regions::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/regions/'.$regions->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/regions/'.$regions->id
        );

        $this->response->assertStatus(404);
    }
}
