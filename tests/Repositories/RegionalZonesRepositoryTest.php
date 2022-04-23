<?php namespace Tests\Repositories;

use App\RegionalZones;
use App\Repositories\RegionalZonesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RegionalZonesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RegionalZonesRepository
     */
    protected $regionalZonesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->regionalZonesRepo = \App::make(RegionalZonesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_regional_zones()
    {
        $regionalZones = factory(RegionalZones::class)->make()->toArray();

        $createdRegionalZones = $this->regionalZonesRepo->create($regionalZones);

        $createdRegionalZones = $createdRegionalZones->toArray();
        $this->assertArrayHasKey('id', $createdRegionalZones);
        $this->assertNotNull($createdRegionalZones['id'], 'Created RegionalZones must have id specified');
        $this->assertNotNull(RegionalZones::find($createdRegionalZones['id']), 'RegionalZones with given id must be in DB');
        $this->assertModelData($regionalZones, $createdRegionalZones);
    }

    /**
     * @test read
     */
    public function test_read_regional_zones()
    {
        $regionalZones = factory(RegionalZones::class)->create();

        $dbRegionalZones = $this->regionalZonesRepo->find($regionalZones->id);

        $dbRegionalZones = $dbRegionalZones->toArray();
        $this->assertModelData($regionalZones->toArray(), $dbRegionalZones);
    }

    /**
     * @test update
     */
    public function test_update_regional_zones()
    {
        $regionalZones = factory(RegionalZones::class)->create();
        $fakeRegionalZones = factory(RegionalZones::class)->make()->toArray();

        $updatedRegionalZones = $this->regionalZonesRepo->update($fakeRegionalZones, $regionalZones->id);

        $this->assertModelData($fakeRegionalZones, $updatedRegionalZones->toArray());
        $dbRegionalZones = $this->regionalZonesRepo->find($regionalZones->id);
        $this->assertModelData($fakeRegionalZones, $dbRegionalZones->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_regional_zones()
    {
        $regionalZones = factory(RegionalZones::class)->create();

        $resp = $this->regionalZonesRepo->delete($regionalZones->id);

        $this->assertTrue($resp);
        $this->assertNull(RegionalZones::find($regionalZones->id), 'RegionalZones should not exist in DB');
    }
}
