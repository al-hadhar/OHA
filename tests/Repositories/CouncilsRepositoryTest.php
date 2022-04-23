<?php namespace Tests\Repositories;

use App\Councils;
use App\Repositories\CouncilsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CouncilsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CouncilsRepository
     */
    protected $councilsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->councilsRepo = \App::make(CouncilsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_councils()
    {
        $councils = factory(Councils::class)->make()->toArray();

        $createdCouncils = $this->councilsRepo->create($councils);

        $createdCouncils = $createdCouncils->toArray();
        $this->assertArrayHasKey('id', $createdCouncils);
        $this->assertNotNull($createdCouncils['id'], 'Created Councils must have id specified');
        $this->assertNotNull(Councils::find($createdCouncils['id']), 'Councils with given id must be in DB');
        $this->assertModelData($councils, $createdCouncils);
    }

    /**
     * @test read
     */
    public function test_read_councils()
    {
        $councils = factory(Councils::class)->create();

        $dbCouncils = $this->councilsRepo->find($councils->id);

        $dbCouncils = $dbCouncils->toArray();
        $this->assertModelData($councils->toArray(), $dbCouncils);
    }

    /**
     * @test update
     */
    public function test_update_councils()
    {
        $councils = factory(Councils::class)->create();
        $fakeCouncils = factory(Councils::class)->make()->toArray();

        $updatedCouncils = $this->councilsRepo->update($fakeCouncils, $councils->id);

        $this->assertModelData($fakeCouncils, $updatedCouncils->toArray());
        $dbCouncils = $this->councilsRepo->find($councils->id);
        $this->assertModelData($fakeCouncils, $dbCouncils->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_councils()
    {
        $councils = factory(Councils::class)->create();

        $resp = $this->councilsRepo->delete($councils->id);

        $this->assertTrue($resp);
        $this->assertNull(Councils::find($councils->id), 'Councils should not exist in DB');
    }
}
