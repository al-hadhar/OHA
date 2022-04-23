<?php namespace Tests\Repositories;

use App\AnimalSurveillance;
use App\Repositories\AnimalSurveillanceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AnimalSurveillanceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AnimalSurveillanceRepository
     */
    protected $animalSurveillanceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->animalSurveillanceRepo = \App::make(AnimalSurveillanceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_animal_surveillance()
    {
        $animalSurveillance = factory(AnimalSurveillance::class)->make()->toArray();

        $createdAnimalSurveillance = $this->animalSurveillanceRepo->create($animalSurveillance);

        $createdAnimalSurveillance = $createdAnimalSurveillance->toArray();
        $this->assertArrayHasKey('id', $createdAnimalSurveillance);
        $this->assertNotNull($createdAnimalSurveillance['id'], 'Created AnimalSurveillance must have id specified');
        $this->assertNotNull(AnimalSurveillance::find($createdAnimalSurveillance['id']), 'AnimalSurveillance with given id must be in DB');
        $this->assertModelData($animalSurveillance, $createdAnimalSurveillance);
    }

    /**
     * @test read
     */
    public function test_read_animal_surveillance()
    {
        $animalSurveillance = factory(AnimalSurveillance::class)->create();

        $dbAnimalSurveillance = $this->animalSurveillanceRepo->find($animalSurveillance->id);

        $dbAnimalSurveillance = $dbAnimalSurveillance->toArray();
        $this->assertModelData($animalSurveillance->toArray(), $dbAnimalSurveillance);
    }

    /**
     * @test update
     */
    public function test_update_animal_surveillance()
    {
        $animalSurveillance = factory(AnimalSurveillance::class)->create();
        $fakeAnimalSurveillance = factory(AnimalSurveillance::class)->make()->toArray();

        $updatedAnimalSurveillance = $this->animalSurveillanceRepo->update($fakeAnimalSurveillance, $animalSurveillance->id);

        $this->assertModelData($fakeAnimalSurveillance, $updatedAnimalSurveillance->toArray());
        $dbAnimalSurveillance = $this->animalSurveillanceRepo->find($animalSurveillance->id);
        $this->assertModelData($fakeAnimalSurveillance, $dbAnimalSurveillance->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_animal_surveillance()
    {
        $animalSurveillance = factory(AnimalSurveillance::class)->create();

        $resp = $this->animalSurveillanceRepo->delete($animalSurveillance->id);

        $this->assertTrue($resp);
        $this->assertNull(AnimalSurveillance::find($animalSurveillance->id), 'AnimalSurveillance should not exist in DB');
    }
}
