<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\AdvertisementMarketerDataTable;
use App\Http\Controllers\Controller;
use App\DataTables\AdvertisementDataTable;
use Carbon\Carbon;
use App\Models\Advertisement;

use App\Http\Controllers\Validations\AdvertisementRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class AdvertisementController extends Controller
{

	public function __construct() {

		/*$this->middleware('AdminRole:advertisementcontroller_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:advertisementcontroller_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:advertisementcontroller_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:advertisementcontroller_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);*/
	}



            /**
             * Baboon Script By [it v 1.6.32]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(AdvertisementDataTable $advertisement)
            {
               return $advertisement->render('admin.advertisement.index',['title'=>trans('admin.advertisement')]);
            }
            public function indexMarketer(AdvertisementMarketerDataTable $advertisement)
            {
               return $advertisement->render('admin.advertisement.index',['title'=>trans('admin.advertisement')]);
            }


            /**
             * Baboon Script By [it v 1.6.32]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {

               return view('admin.advertisement.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.32]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(AdvertisementRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['photos'] = "";
$data['videos'] = "";
$data['admin_id'] = admin()->id();
		  		$advertisement = Advertisement::create($data);
               if(request()->hasFile('photos')){
              $advertisement->photos = it()->upload('photos','advertisement/'.$advertisement->id);
              $advertisement->save();
              }
               if(request()->hasFile('videos')){
              $advertisement->videos = it()->upload('videos','advertisement/'.$advertisement->id);
              $advertisement->save();
              }
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('advertisement'.$redirect), trans('admin.added')); }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.32]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$advertisement =  Advertisement::find($id);
        		return is_null($advertisement) || empty($advertisement)?
        		backWithError(trans("admin.undefinedRecord"),aurl("advertisement")) :
        		view('admin.advertisement.show',[
				    'title'=>trans('admin.show'),
					'advertisement'=>$advertisement
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.32]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$advertisement =  Advertisement::find($id);
        		return is_null($advertisement) || empty($advertisement)?
        		backWithError(trans("admin.undefinedRecord"),aurl("advertisement")) :
        		view('admin.advertisement.edit',[
				  'title'=>trans('admin.edit'),
				  'advertisement'=>$advertisement
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
				foreach (array_keys((new AdvertisementRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(AdvertisementRequest $request,$id)
            {
              // Check Record Exists
              $advertisement =  Advertisement::find($id);
              if(is_null($advertisement) || empty($advertisement)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("advertisement"));
              }
              $data = $this->updateFillableColumns();
              $data['admin_id'] = admin()->id();
               if(request()->hasFile('photos')){
              it()->delete($advertisement->photos);
              $data['photos'] = it()->upload('photos','advertisement');
               }
               if(request()->hasFile('videos')){
              it()->delete($advertisement->videos);
              $data['videos'] = it()->upload('videos','advertisement');
               }
              Advertisement::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('advertisement'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.32]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$advertisement = Advertisement::find($id);
		if(is_null($advertisement) || empty($advertisement)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("advertisement"));
		}
               		if(!empty($advertisement->photos)){
			it()->delete($advertisement->photos);		}
		if(!empty($advertisement->videos)){
			it()->delete($advertisement->videos);		}

		it()->delete('advertisement',$id);
		$advertisement->delete();
		return redirectWithSuccess(aurl("advertisement"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$advertisement = Advertisement::find($id);
				if(is_null($advertisement) || empty($advertisement)){
					return backWithError(trans('admin.undefinedRecord'),aurl("advertisement"));
				}
                    					if(!empty($advertisement->photos)){
				  it()->delete($advertisement->photos);
				}				if(!empty($advertisement->videos)){
				  it()->delete($advertisement->videos);
				}
				it()->delete('advertisement',$id);
				$advertisement->delete();
			}
			return redirectWithSuccess(aurl("advertisement"),trans('admin.deleted'));
		}else {
			$advertisement = Advertisement::find($data);
			if(is_null($advertisement) || empty($advertisement)){
				return backWithError(trans('admin.undefinedRecord'),aurl("advertisement"));
			}

			if(!empty($advertisement->photos)){
			 it()->delete($advertisement->photos);
			}			if(!empty($advertisement->videos)){
			 it()->delete($advertisement->videos);
			}			it()->delete('advertisement',$data);
			$advertisement->delete();
			return redirectWithSuccess(aurl("advertisement"),trans('admin.deleted'));
		}
	}


}
