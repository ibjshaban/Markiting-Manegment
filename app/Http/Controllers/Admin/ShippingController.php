<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\ShippingMarketerDataTable;
use App\Http\Controllers\Controller;
use App\DataTables\ShippingDataTable;
use Carbon\Carbon;
use App\Models\Shipping;

use App\Http\Controllers\Validations\ShippingRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class ShippingController extends Controller
{

	public function __construct() {

		/*$this->middleware('AdminRole:shippingcontroller_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:shippingcontroller_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:shippingcontroller_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:shippingcontroller_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);*/
	}



            /**
             * Baboon Script By [it v 1.6.32]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(ShippingDataTable $shipping)
            {
               return $shipping->render('admin.shipping.index',['title'=>trans('admin.shipping')]);
            }


            /**
             * Baboon Script By [it v 1.6.32]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {

               return view('admin.shipping.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.32]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(ShippingRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['admin_id'] = admin()->id();
		  		$shipping = Shipping::create($data);
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('shipping'.$redirect), trans('admin.added')); }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.32]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$shipping =  Shipping::find($id);
        		return is_null($shipping) || empty($shipping)?
        		backWithError(trans("admin.undefinedRecord"),aurl("shipping")) :
        		view('admin.shipping.show',[
				    'title'=>trans('admin.show'),
					'shipping'=>$shipping
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.32]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$shipping =  Shipping::find($id);
        		return is_null($shipping) || empty($shipping)?
        		backWithError(trans("admin.undefinedRecord"),aurl("shipping")) :
        		view('admin.shipping.edit',[
				  'title'=>trans('admin.edit'),
				  'shipping'=>$shipping
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.32]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				$fillableCols = [];
				foreach (array_keys((new ShippingRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(ShippingRequest $request,$id)
            {
              // Check Record Exists
              $shipping =  Shipping::find($id);
              if(is_null($shipping) || empty($shipping)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("shipping"));
              }
              $data = $this->updateFillableColumns();
              $data['admin_id'] = admin()->id();
              Shipping::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('shipping'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.32]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$shipping = Shipping::find($id);
		if(is_null($shipping) || empty($shipping)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("shipping"));
		}

		it()->delete('shipping',$id);
		$shipping->delete();
		return redirectWithSuccess(aurl("shipping"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$shipping = Shipping::find($id);
				if(is_null($shipping) || empty($shipping)){
					return backWithError(trans('admin.undefinedRecord'),aurl("shipping"));
				}

				it()->delete('shipping',$id);
				$shipping->delete();
			}
			return redirectWithSuccess(aurl("shipping"),trans('admin.deleted'));
		}else {
			$shipping = Shipping::find($data);
			if(is_null($shipping) || empty($shipping)){
				return backWithError(trans('admin.undefinedRecord'),aurl("shipping"));
			}

			it()->delete('shipping',$data);
			$shipping->delete();
			return redirectWithSuccess(aurl("shipping"),trans('admin.deleted'));
		}
	}

    public function indexMarketer(ShippingMarketerDataTable $shipping)
    {
        return $shipping->render('admin.shipping.index',['title'=>trans('admin.shipping')]);
    }



}
