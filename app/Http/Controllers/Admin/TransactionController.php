<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TransactionDataTable;
use App\DataTables\TransactionMarketerDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\TransactionRequest;
use App\Models\Marketer;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class TransactionController extends Controller
{

    public function __construct()
    {

        /*$this->middleware('AdminRole:transactioncontroller_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:transactioncontroller_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:transactioncontroller_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:transactioncontroller_delete', [
            'only' => ['destroy', 'multi_delete'],
        ]);*/
    }


    /**
     * Baboon Script By [it v 1.6.32]
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(TransactionDataTable $transaction)
    {
        return $transaction->render('admin.transaction.index', ['title' => trans('admin.transaction')]);
    }


    /**
     * Baboon Script By [it v 1.6.32]
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.transaction.create', ['title' => trans('admin.create')]);
    }

    /**
     * Baboon Script By [it v 1.6.32]
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response Or Redirect
     */
    public function store(TransactionRequest $request)
    {
        $data = $request->except("_token", "_method");
        $data['photo'] = "";
        $data['admin_id'] = admin()->id();
        $transaction = Transaction::create($data);
        Marketer::Where('id', $data['marketer_id'])->update(['amount_paid' => DB::raw('amount_paid + ' . $data['amount'])]);
        Marketer::Where('id', $data['marketer_id'])->update(['amount_due' => DB::raw('amount_due - ' . $data['amount'])]);
        if (request()->hasFile('photo')) {
            $transaction->photo = it()->upload('photo', 'transaction/' . $transaction->id);
            $transaction->save();
        }
        $redirect = isset($request["add_back"]) ? "/create" : "";
        return redirectWithSuccess(aurl('transaction' . $redirect), trans('admin.added'));
    }

    /**
     * Display the specified resource.
     * Baboon Script By [it v 1.6.32]
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);
        return is_null($transaction) || empty($transaction) ?
            backWithError(trans("admin.undefinedRecord"), aurl("transaction")) :
            view('admin.transaction.show', [
                'title' => trans('admin.show'),
                'transaction' => $transaction
            ]);
    }


    /**
     * Baboon Script By [it v 1.6.32]
     * edit the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::find($id);
        return is_null($transaction) || empty($transaction) ?
            backWithError(trans("admin.undefinedRecord"), aurl("transaction")) :
            view('admin.transaction.edit', [
                'title' => trans('admin.edit'),
                'transaction' => $transaction
            ]);
    }

    public function update(TransactionRequest $request, $id)
    {
        // Check Record Exists
        $transaction = Transaction::find($id);
        if (is_null($transaction) || empty($transaction)) {
            return backWithError(trans("admin.undefinedRecord"), aurl("transaction"));
        }
        $data = $this->updateFillableColumns();
        $data['admin_id'] = admin()->id();
        if (request()->hasFile('photo')) {
            it()->delete($transaction->photo);
            $data['photo'] = it()->upload('photo', 'transaction');
        }
        Marketer::Where('id', $data['marketer_id'])->update(['amount_paid' => DB::raw('amount_paid + ' . $data['amount'])]);
        Marketer::Where('id', $data['marketer_id'])->update(['amount_due' => DB::raw('amount_due - ' . $data['amount'])]);
        Transaction::where('id', $id)->update($data);
        $redirect = isset($request["save_back"]) ? "/" . $id . "/edit" : "";
        return redirectWithSuccess(aurl('transaction' . $redirect), trans('admin.updated'));
    }

    /**
     * Baboon Script By [it v 1.6.32]
     * update a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateFillableColumns()
    {
        $fillableCols = [];
        foreach (array_keys((new TransactionRequest)->attributes()) as $fillableUpdate) {
            if (!is_null(request($fillableUpdate))) {
                $fillableCols[$fillableUpdate] = request($fillableUpdate);
            }
        }
        return $fillableCols;
    }

    /**
     * Baboon Script By [it v 1.6.32]
     * destroy a newly created resource in storage.
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        if (is_null($transaction) || empty($transaction)) {
            return backWithSuccess(trans('admin.undefinedRecord'), aurl("transaction"));
        }
        if (!empty($transaction->photo)) {
            it()->delete($transaction->photo);
        }

        it()->delete('transaction', $id);
        $transaction->delete();
        return redirectWithSuccess(aurl("transaction"), trans('admin.deleted'));
    }


    public function multi_delete()
    {
        $data = request('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $transaction = Transaction::find($id);
                if (is_null($transaction) || empty($transaction)) {
                    return backWithError(trans('admin.undefinedRecord'), aurl("transaction"));
                }
                if (!empty($transaction->photo)) {
                    it()->delete($transaction->photo);
                }
                it()->delete('transaction', $id);
                $transaction->delete();
            }
            return redirectWithSuccess(aurl("transaction"), trans('admin.deleted'));
        } else {
            $transaction = Transaction::find($data);
            if (is_null($transaction) || empty($transaction)) {
                return backWithError(trans('admin.undefinedRecord'), aurl("transaction"));
            }

            if (!empty($transaction->photo)) {
                it()->delete($transaction->photo);
            }
            it()->delete('transaction', $data);
            $transaction->delete();
            return redirectWithSuccess(aurl("transaction"), trans('admin.deleted'));
        }
    }
    public function indexMarketer(TransactionMarketerDataTable $transaction)
    {
        return $transaction->render('admin.transaction.index', ['title' => trans('admin.transaction')]);
    }


}
