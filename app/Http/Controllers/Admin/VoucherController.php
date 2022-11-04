<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Voucher\VoucherRepositoryInterface;
use App\Http\Repositories\Voucher\BaseRepository;
use App\Models\Voucher;
use App\Services\Voucher\Actions\CreateVoucherAction;
use App\Services\Voucher\Actions\DeleteVoucherAction;
use App\Services\Voucher\Actions\ShowVoucherAction;
use App\Services\Voucher\Actions\UpdateVoucherAction;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    
    public function index(){
        $voucherList = resolve(ShowVoucherAction::class)->run();
        // $voucherList = Voucher::with('voucher')->get();
        return view('admin.vouchers.index', array(
            'voucherList' => $voucherList
        ));
    }

    public function create(){
        
        $voucherList = resolve(ShowVoucherAction::class)->run();
        return view('admin.vouchers.create', array('voucherList' => $voucherList));
    }

    public function store(Request $request){
        $voucher = resolve(CreateVoucherAction::class)->create($request->all());
        // $voucher =  Voucher::create($request->all());
        $request->session()->flash('status', 'them thanh cong');
        return redirect()->route('admin.vouchers.index');
    }
        
    

    public function edit($id){
        $voucher = resolve(ShowVoucherAction::class)->find;
        // $voucher = Voucher::find($id);
        return view('admin.vouchers.edit', array('voucher' => $voucher));
    }

    public function update(Request $request, $id){
        $voucher = resolve(UpdateVoucherAction::class)->update($request->all(), $id);
        return redirect()->route('admin.vouchers.index');
    }

    public function destroy($id){
        $voucher = resolve(DeleteVoucherAction::class)->delete( $id);
        return redirect()->route('admin.vouchers.index');
    }

}
