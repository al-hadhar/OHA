<?php namespace Tests\Repositories;

use App\Regions;
use App\Repositories\RegionsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RegionsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RegionsRepository
     */
    protected $regionsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->regionsRepo = \App::make(RegionsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_regions()
    {
        $regions = factory(Regions::class)->make()->toArray();

        $createdRegions = $this->regionsRepo->create($regions);

        $createdRegions = $createdRegions->toArray();
        $this->assertArrayHasKey('id', $createdRegions);
        $this->assertNotNull($createdRegions['id'], 'Created Regions must have id specified');
        $this->assertNotNull(Regions::find($createdRegions['id']), 'Regions with given id must be in DB');
        $this->assertModelData($regions, $createdRegions);
    }

    /**
     * @test read
     */
    public function test_read_regions()
    {
        $regions = factory(Regions::class)->create();

        $dbRegions = $this->regionsRepo->find($regions->id);

        $dbRegions = $dbRegions->toArray();
        $this->assertModelData($regions->toArray(), $dbRegions);
    }

    /**
     * @test update
     */
    public function test_update_regions()
    {
        $regions = factory(Regions::class)->create();
        $fakeRegions = factory(Regions::class)->make()->toArray();

        $updatedRegions = $this->regionsRepo->update($fakeRegions, $regions->id);

        $this->assertModelData($fakeRegions, $updatedRegions->toArray());
        $dbRegions = $this->regionsRepo->find($regions->id);
        $this->assertModelData($fakeRegions, $dbRegions->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_regions()
    {
        $regions = factory(Regions::class)->create();

        $resp = $this->regionsRepo->delete($regions->id);

        $this->assertTrue($resp);
        $this->assertNull(Regions::find($regions->id), 'Regions should not exist in DB');
    }
}
