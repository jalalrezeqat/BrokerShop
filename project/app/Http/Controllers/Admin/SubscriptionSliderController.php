<?php

namespace App\Http\Controllers\Admin;

use Datatables;
use App\Models\Subscription_slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


use Validator;

class SubscriptionSliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Subscription_slider::orderBy('id','desc')->get();
        //  --- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('price', function(Subscription_slider $data) {
                                $price = round($data->price,2);
                                return $price;
                            })
                            ->editColumn('allowed_products', function(Subscription_slider $data) {
                                $allowed_products = $data->allowed_products == 0 ? "Unlimited": $data->allowed_products;
                                return $allowed_products;
                            })
                            ->addColumn('action', function(Subscription_slider $data) {
                                return '<div class="action-list"><a data-href="' . route('admin-subscription-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin-subscription-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            }) 
                            ->rawColumns(['action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.subscriptionslider.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.subscriptionslider.create');
    }

    //*** POST Request
    public function store(Request $request)
    {

        //--- Logic Section
        $data = new Subscription_slider();
        $input = $request->all();

        if($input['limit'] == 0)
         {
            $input['allowed_products'] = 0;
         }

        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section        
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends    
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Subscription_slider::findOrFail($id);
        return view('admin.subscriptionslider.edit',compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Logic Section
        $data = Subscription_slider::findOrFail($id);
        $input = $request->all();
        if($input['limit'] == 0)
         {
            $input['allowed_products'] = 0;
         }
        $data->update($input);
        //--- Logic Section Ends
        $data->subs()->update(['allowed_products' => $data->allowed_products]);

        //--- Redirect Section     
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends            
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Subscription_slider::findOrFail($id);
        $data->delete();
        //--- Redirect Section     
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends     
    }
}
