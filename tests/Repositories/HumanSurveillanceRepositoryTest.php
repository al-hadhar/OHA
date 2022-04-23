<?php namespace Tests\Repositories;

use App\HumanSurveillance;
use App\Repositories\HumanSurveillanceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class HumanSurveillanceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var HumanSurveillanceRepository
     */
    protected $humanSurveillanceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->humanSurveillanceRepo = \App::make(HumanSurveillanceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_human_surveillance()
    {
        $humanSurveillance = factory(HumanSurveillance::class)->make()->toArray();

        $createdHumanSurveillance = $this->humanSurveillanceRepo->create($humanSurveillance);

        $createdHumanSurveillance = $createdHumanSurveillance->toArray();
        $this->assertArrayHasKey('id', $createdHumanSurveillance);
        $this->assertNotNull($createdHumanSurveillance['id'], 'Created HumanSurveillance must have id specified');
        $this->assertNotNull(HumanSurveillance::find($createdHumanSurveillance['id']), 'HumanSurveillance with given id must be in DB');
        $this->assertModelData($humanSurveillance, $createdHumanSurveillance);
    }

    /**
     * @test read
     */
    public function test_read_human_surveillance()
    {
        $humanSurveillance = factory(HumanSurveillance::class)->create();

        $dbHumanSurveillance = $this->humanSurveillanceRepo->find($humanSurveillance->id);

        $dbHumanSurveillance = $dbHumanSurveillance->toArray();
        $this->assertModelData($humanSurveillance->toArray(), $dbHumanSurveillance);
    }

    /**
     * @test update
     */
    public function test_update_human_surveillance()
    {
        $humanSurveillance = factory(HumanSurveillance::class)->create();
        $fakeHumanSurveillance = factory(HumanSurveillance::class)->make()->toArray();

        $updatedHumanSurveillance = $this->humanSurveillanceRepo->update($fakeHumanSurveillance, $humanSurveillance->id);

        $this->assertModelData($fakeHumanSurveillance, $updatedHumanSurveillance->toArray());
        $dbHumanSurveillance = $this->humanSurveillanceRepo->find($humanSurveillance->id);
        $this->assertModelData($fakeHumanSurveillance, $dbHumanSurveillance->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_human_surveillance()
    {
        $humanSurveillance = factory(HumanSurveillance::class)->create();

        $resp = $this->humanSurveillanceRepo->delete($humanSurveillance->id);

        $this->assertTrue($resp);
        $this->assertNull(HumanSurveillance::find($humanSurveillance->id), 'HumanSurveillance should not exist in DB');
    }
}
