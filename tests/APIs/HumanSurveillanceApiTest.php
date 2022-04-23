<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\HumanSurveillance;

class HumanSurveillanceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_human_surveillance()
    {
        $humanSurveillance = factory(HumanSurveillance::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/human_surveillances', $humanSurveillance
        );

        $this->assertApiResponse($humanSurveillance);
    }

    /**
     * @test
     */
    public function test_read_human_surveillance()
    {
        $humanSurveillance = factory(HumanSurveillance::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/human_surveillances/'.$humanSurveillance->id
        );

        $this->assertApiResponse($humanSurveillance->toArray());
    }

    /**
     * @test
     */
    public function test_update_human_surveillance()
    {
        $humanSurveillance = factory(HumanSurveillance::class)->create();
        $editedHumanSurveillance = factory(HumanSurveillance::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/human_surveillances/'.$humanSurveillance->id,
            $editedHumanSurveillance
        );

        $this->assertApiResponse($editedHumanSurveillance);
    }

    /**
     * @test
     */
    public function test_delete_human_surveillance()
    {
        $humanSurveillance = factory(HumanSurveillance::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/human_surveillances/'.$humanSurveillance->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/human_surveillances/'.$humanSurveillance->id
        );

        $this->response->assertStatus(404);
    }
}
