<?php namespace Tests\Repositories;

use App\UploadHeader;
use App\Repositories\UploadHeaderRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UploadHeaderRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UploadHeaderRepository
     */
    protected $uploadHeaderRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->uploadHeaderRepo = \App::make(UploadHeaderRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_upload_header()
    {
        $uploadHeader = factory(UploadHeader::class)->make()->toArray();

        $createdUploadHeader = $this->uploadHeaderRepo->create($uploadHeader);

        $createdUploadHeader = $createdUploadHeader->toArray();
        $this->assertArrayHasKey('id', $createdUploadHeader);
        $this->assertNotNull($createdUploadHeader['id'], 'Created UploadHeader must have id specified');
        $this->assertNotNull(UploadHeader::find($createdUploadHeader['id']), 'UploadHeader with given id must be in DB');
        $this->assertModelData($uploadHeader, $createdUploadHeader);
    }

    /**
     * @test read
     */
    public function test_read_upload_header()
    {
        $uploadHeader = factory(UploadHeader::class)->create();

        $dbUploadHeader = $this->uploadHeaderRepo->find($uploadHeader->id);

        $dbUploadHeader = $dbUploadHeader->toArray();
        $this->assertModelData($uploadHeader->toArray(), $dbUploadHeader);
    }

    /**
     * @test update
     */
    public function test_update_upload_header()
    {
        $uploadHeader = factory(UploadHeader::class)->create();
        $fakeUploadHeader = factory(UploadHeader::class)->make()->toArray();

        $updatedUploadHeader = $this->uploadHeaderRepo->update($fakeUploadHeader, $uploadHeader->id);

        $this->assertModelData($fakeUploadHeader, $updatedUploadHeader->toArray());
        $dbUploadHeader = $this->uploadHeaderRepo->find($uploadHeader->id);
        $this->assertModelData($fakeUploadHeader, $dbUploadHeader->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_upload_header()
    {
        $uploadHeader = factory(UploadHeader::class)->create();

        $resp = $this->uploadHeaderRepo->delete($uploadHeader->id);

        $this->assertTrue($resp);
        $this->assertNull(UploadHeader::find($uploadHeader->id), 'UploadHeader should not exist in DB');
    }
}
