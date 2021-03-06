<?php

namespace App\Repositories;

use App\UploadHeader;
use App\Repositories\BaseRepository;

/**
 * Class UploadHeaderRepository
 * @package App\Repositories
 * @version April 23, 2022, 12:23 pm IST
*/

class UploadHeaderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'file_name',
        'file_path',
        'total_success',
        'total_failed',
        'status'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UploadHeader::class;
    }
}
