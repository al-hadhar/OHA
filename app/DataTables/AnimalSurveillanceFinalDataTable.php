<?php

namespace App\DataTables;

use App\AnimalSurveillanceFinal;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class AnimalSurveillanceFinalDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'animal_surveillance_finals.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AnimalSurveillanceFinal $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AnimalSurveillanceFinal $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'upload_header_id',
            'region',
            'district',
            'village',
            'observation_date',
            'disease',
            'specie_affected',
            'cases',
            'death',
            'not_at_rist',
            'treated',
            'destroyed',
            'slaughtered',
            'vaccinated',
            'lat',
            'long',
            'status'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'animal_surveillance_finalsdatatable_' . time();
    }
}
