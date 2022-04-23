<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\AnimalSurveillance;

class AnimalSurveillanceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_animal_surveillance()
    {
        $animalSurveillance = factory(AnimalSurveillance::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/animal_surveillances', $animalSurveillance
        );

        $this->assertApiResponse($animalSurveillance);
    }

    /**
     * @test
     */
    public function test_read_animal_surveillance()
    {
        $animalSurveillance = factory(AnimalSurveillance::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/animal_surveillances/'.$animalSurveillance->id
        );

        $this->assertApiResponse($animalSurveillance->toArray());
    }

    /**
     * @test
     */
    public function test_update_animal_surveillance()
    {
        $animalSurveillance = factory(AnimalSurveillance::class)->create();
        $editedAnimalSurveillance = factory(AnimalSurveillance::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/animal_surveillances/'.$animalSurveillance->id,
            $editedAnimalSurveillance
        );

        $this->assertApiResponse($editedAnimalSurveillance);
    }

    /**
     * @test
     */
    public function test_delete_animal_surveillance()
    {
        $animalSurveillance = factory(AnimalSurveillance::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/animal_surveillances/'.$animalSurveillance->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/animal_surveillances/'.$animalSurveillance->id
        );

        $this->response->assertStatus(404);
    }
}
