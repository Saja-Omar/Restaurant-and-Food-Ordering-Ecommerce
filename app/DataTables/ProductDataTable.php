<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query) {
                $edit = "<a href='".route('admin.product.edit', $query->id)."' class='btn btn-primary btn-sm mx-1' style='width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;'><i class='fas fa-edit'></i></a>";
                $delete = "<button data-id='$query->id' data-type='product' class='btn btn-danger btn-sm mx-1 delete-item'><i class='fas fa-trash'></i></button>";
                $more = '<div class="btn-group dropleft">
                <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></button>
                <div class="dropdown-menu dropleft" x-placement="left-start" style="position: absolute; transform: translate3d(-2px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                  <a class="dropdown-item" href="'.route('admin.product-ize.show-index',$query->id).'">Product Size</a>
                </div>
              </div>';

                return '<div class="d-flex justify-content-center">'.$edit.$delete.$more.'</div>';
            })


             ->addColumn('price', function($query){
                            return '$'.$query->price;
            })
            ->addColumn('offer_price', function($query){
                return '$'.$query->offer_price;
                })
                ->addColumn('show_at_home', function($query) {
                    return $query->show_at_home === 1 ? 'Active' : 'InActive';
                })
                ->addColumn('status', function($query) {
                    return $query->status === 1 ? 'Active' : 'InActive';
                }) ->rawColumns(['show_at_home', 'status', 'action'])
                ->addColumn('image', function($query) {
                    return '<div style="display: flex; align-items: center; justify-content: center; height: 100%;"><img src="'. asset('storage/'.$query->thumb_image) .'" alt="Image" style="width: 100px; height: 80px; object-fit: cover;"></div>';
                })

                ->rawColumns(['show_at_home', 'status', 'action', 'image'])

            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('product-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('name'),
            Column::make('price'),
            Column::make('offer_price'),
            Column::make('status'),
            Column::make('show_at_home'),
            Column::make('image'),

            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
