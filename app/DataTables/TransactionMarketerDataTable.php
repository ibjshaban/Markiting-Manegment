<?php

namespace App\DataTables;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;

// Auto DataTable By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.32]
// Copyright Reserved [it v 1.6.32]
class TransactionMarketerDataTable extends DataTable
{


    /**
     * dataTable to render Columns.
     * Auto Ajax Method By Baboon Script [it v 1.6.32]
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataTable(DataTables $dataTables, $query)
    {
        return datatables($query)
            ->addColumn('photo', '{!! view("admin.show_image",["image"=>$photo])->render() !!}')
            ->addColumn('created_at', '{{ date("Y-m-d H:i:s",strtotime($created_at)) }}')
            ->addColumn('updated_at', '{{ date("Y-m-d H:i:s",strtotime($updated_at)) }}')
            ->rawColumns(['checkbox', 'actions', "photo",]);
    }


    /**
     * Get the query object to be processed by dataTables.
     * Auto Ajax Method By Baboon Script [it v 1.6.32]
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        //return Transaction::query()->with(['marketer_id',])->select("transactions.*");
        if (Auth::guard('admin')->check())
            return Transaction::query()->with(['marketer_id',])->select("transactions.*");
        elseif (Auth::guard('marketer')->check())
            return Transaction::query()->select("transactions.*")->where('marketer_id', '=', auth()->guard('marketer')->user()->id);
    }


    /**
     * Optional method if you want to use html builder.
     *[it v 1.6.32]
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        $html = $this->builder()
            ->columns($this->getColumns())
            //->ajax('')
            ->parameters([
                'searching' => true,
                'paging' => true,
                'bLengthChange' => true,
                'bInfo' => true,
                'responsive' => true,
                'dom' => 'Blfrtip',
                "lengthMenu" => [[10, 25, 50, 100, -1], [10, 25, 50, 100, trans('admin.all_records')]],
                'buttons' => [
                    /*[
                      'extend' => 'print',
                      'className' => 'btn btn-outline',
                      'text' => '<i class="fa fa-print"></i> '.trans('admin.print')
                     ],	[
                    'extend' => 'excel',
                    'className' => 'btn btn-outline',
                    'text' => '<i class="fa fa-file-excel"> </i> '.trans('admin.export_excel')
                    ],	[
                    'extend' => 'csv',
                    'className' => 'btn btn-outline',
                    'text' => '<i class="fa fa-file-excel"> </i> '.trans('admin.export_csv')
                    ],	[
                     'extend' => 'pdf',
                     'className' => 'btn btn-outline',
                     'text' => '<i class="fa fa-file-pdf"> </i> '.trans('admin.export_pdf')
                    ],	[
                    'extend' => 'reload',
                    'className' => 'btn btn-outline',
                    'text' => '<i class="fa fa-sync-alt"></i> '.trans('admin.reload')
                    ],	[
                        'text' => '<i class="fa fa-trash"></i> '.trans('admin.delete'),
                        'className'    => 'btn btn-outline deleteBtn',
                    ], 	[
                        'text' => '<i class="fa fa-plus"></i> '.trans('admin.add'),
                        'className'    => 'btn btn-primary',
                        'action'    => 'function(){
                            window.location.href =  "'.\URL::current().'/create";
                        }',
                    ],*/
                ],
                'initComplete' => "function () {



            " . filterElement('1,2,3', 'input') . "



	            }",
                'order' => [[1, 'desc']],

                'language' => [
                    'sProcessing' => trans('admin.sProcessing'),
                    'sLengthMenu' => trans('admin.sLengthMenu'),
                    'sZeroRecords' => trans('admin.sZeroRecords'),
                    'sEmptyTable' => trans('admin.sEmptyTable'),
                    'sInfo' => trans('admin.sInfo'),
                    'sInfoEmpty' => trans('admin.sInfoEmpty'),
                    'sInfoFiltered' => trans('admin.sInfoFiltered'),
                    'sInfoPostFix' => trans('admin.sInfoPostFix'),
                    'sSearch' => trans('admin.sSearch'),
                    'sUrl' => trans('admin.sUrl'),
                    'sInfoThousands' => trans('admin.sInfoThousands'),
                    'sLoadingRecords' => trans('admin.sLoadingRecords'),
                    'oPaginate' => [
                        'sFirst' => trans('admin.sFirst'),
                        'sLast' => trans('admin.sLast'),
                        'sNext' => trans('admin.sNext'),
                        'sPrevious' => trans('admin.sPrevious'),
                    ],
                    'oAria' => [
                        'sSortAscending' => trans('admin.sSortAscending'),
                        'sSortDescending' => trans('admin.sSortDescending'),
                    ],
                ]
            ]);

        return $html;

    }


    /**
     * Get columns.
     * Auto getColumns Method By Baboon Script [it v 1.6.32]
     * @return array
     */

    protected function getColumns()
    {
        return [


            [
                'name' => 'id',
                'data' => 'id',
                'title' => trans('admin.record_id'),
                'width' => '10px',
                'aaSorting' => 'none'
            ],
            [
                'name' => 'transaction_number',
                'data' => 'transaction_number',
                'title' => trans('admin.transaction_number'),
            ],
            [
                'name' => 'amount',
                'data' => 'amount',
                'title' => trans('admin.amount'),
            ],
            [
                'name' => 'photo',
                'data' => 'photo',
                'title' => trans('admin.photo'),
            ],

            [
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => trans('admin.created_at'),
                'exportable' => false,
                'printable' => false,
                'searchable' => false,
                'orderable' => false,
            ],
            [
                'name' => 'updated_at',
                'data' => 'updated_at',
                'title' => trans('admin.updated_at'),
                'exportable' => false,
                'printable' => false,
                'searchable' => false,
                'orderable' => false,
            ],

        ];
    }

    /**
     * Get filename for export.
     * Auto filename Method By Baboon Script
     * @return string
     */
    protected function filename()
    {
        return 'transaction_' . time();
    }

}
