<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\UploadHeader;

class UploadHeaderApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_upload_header()
    {
        $uploadHeader = factory(UploadHeader::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/upload_headers', $uploadHeader
        );

        $this->assertApiResponse($uploadHeader);
    }

    /**
     * @test
     */
    public function test_read_upload_header()
    {
        $uploadHeader = factory(UploadHeader::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/upload_headers/'.$uploadHeader->id
        );

        $this->assertApiResponse($uploadHeader->toArray());
    }

    /**
     * @test
     */
    public function test_update_upload_header()
    {
        $uploadHeader = factory(UploadHeader::class)->create();
        $editedUploadHeader = factory(UploadHeader::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/upload_headers/'.$uploadHeader->id,
            $editedUploadHeader
        );

        $this->assertApiResponse($editedUploadHeader);
    }

    /**
     * @test
     */
    public function test_delete_upload_header()
    {
        $uploadHeader = factory(UploadHeader::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/upload_headers/'.$uploadHeader->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/upload_headers/'.$uploadHeader->id
        );

        $this->response->assertStatus(404);
    }
}
