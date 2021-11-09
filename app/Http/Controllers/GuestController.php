<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\DataTables\GuestDataTable;
use Carbon\Carbon;
use App\Models\Guest;

use App\Http\Controllers\Validations\GuestRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class GuestController extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:guest_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:guest_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:guest_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:guest_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}



            /**
             * Baboon Script By [it v 1.6.32]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(GuestDataTable $guest)
            {
               return $guest->render('admin.guest.index',['title'=>trans('admin.guest')]);
            }


            /**
             * Baboon Script By [it v 1.6.32]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {

               return view('admin.guest.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.32]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(GuestRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['admin_id'] = admin()->id();
		  		$guest = Guest::create($data);
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('guest'.$redirect), trans('admin.added')); }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.32]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$guest =  Guest::find($id);
        		return is_null($guest) || empty($guest)?
        		backWithError(trans("admin.undefinedRecord"),aurl("guest")) :
        		view('admin.guest.show',[
				    'title'=>trans('admin.show'),
					'guest'=>$guest
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.32]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$guest =  Guest::find($id);
        		return is_null($guest) || empty($guest)?
        		backWithError(trans("admin.undefinedRecord"),aurl("guest")) :
        		view('admin.guest.edit',[
				  'title'=>trans('admin.edit'),
				  'guest'=>$guest
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
				foreach (array_keys((new GuestRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(GuestRequest $request,$id)
            {
              // Check Record Exists
              $guest =  Guest::find($id);
              if(is_null($guest) || empty($guest)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("guest"));
              }
              $data = $this->updateFillableColumns();
              $data['admin_id'] = admin()->id();
              Guest::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('guest'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.32]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$guest = Guest::find($id);
		if(is_null($guest) || empty($guest)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("guest"));
		}

		it()->delete('guest',$id);
		$guest->delete();
		return redirectWithSuccess(aurl("guest"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$guest = Guest::find($id);
				if(is_null($guest) || empty($guest)){
					return backWithError(trans('admin.undefinedRecord'),aurl("guest"));
				}

				it()->delete('guest',$id);
				$guest->delete();
			}
			return redirectWithSuccess(aurl("guest"),trans('admin.deleted'));
		}else {
			$guest = Guest::find($data);
			if(is_null($guest) || empty($guest)){
				return backWithError(trans('admin.undefinedRecord'),aurl("guest"));
			}

			it()->delete('guest',$data);
			$guest->delete();
			return redirectWithSuccess(aurl("guest"),trans('admin.deleted'));
		}
	}


}
