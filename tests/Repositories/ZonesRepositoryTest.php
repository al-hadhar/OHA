<?php namespace Tests\Repositories;

use App\Zones;
use App\Repositories\ZonesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ZonesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ZonesRepository
     */
    protected $zonesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->zonesRepo = \App::make(ZonesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_zones()
    {
        $zones = factory(Zones::class)->make()->toArray();

        $createdZones = $this->zonesRepo->create($zones);

        $createdZones = $createdZones->toArray();
        $this->assertArrayHasKey('id', $createdZones);
        $this->assertNotNull($createdZones['id'], 'Created Zones must have id specified');
        $this->assertNotNull(Zones::find($createdZones['id']), 'Zones with given id must be in DB');
        $this->assertModelData($zones, $createdZones);
    }

    /**
     * @test read
     */
    public function test_read_zones()
    {
        $zones = factory(Zones::class)->create();

        $dbZones = $this->zonesRepo->find($zones->id);

        $dbZones = $dbZones->toArray();
        $this->assertModelData($zones->toArray(), $dbZones);
    }

    /**
     * @test update
     */
    public function test_update_zones()
    {
        $zones = factory(Zones::class)->create();
        $fakeZones = factory(Zones::class)->make()->toArray();

        $updatedZones = $this->zonesRepo->update($fakeZones, $zones->id);

        $this->assertModelData($fakeZones, $updatedZones->toArray());
        $dbZones = $this->zonesRepo->find($zones->id);
        $this->assertModelData($fakeZones, $dbZones->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_zones()
    {
        $zones = factory(Zones::class)->create();

        $resp = $this->zonesRepo->delete($zones->id);

        $this->assertTrue($resp);
        $this->assertNull(Zones::find($zones->id), 'Zones should not exist in DB');
    }
}
