<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Provider;
use Illuminate\Http\Request;
Use App\Http\Requests\PurchaseStoreRequest;
Use App\Http\Requests\PurchaseUpdateRequest;


class PurchaseController extends Controller
{
  public function index()
  {

        $purchases = Purchase::get();
      return view('admin.purchase.index', compact('purchases'));
  }


  public function create()
  {
    $providers = Provider::get();
    return view('admin.purchase.create', compact('providers'));
  }


  public function store(PurchaseStoreRequest $request)
  {
      $purchase = Purchase::create($request->all());

      foreach ($request->product_id as $key => $product)
      {
        $results[] =array(
            "product_id"=>$request->product_id[$key],
            "quantity"=>$request->quantity[$key],
            "price"=>$request->price[$key]);
      }

      $purchase->purchaseDetails()->createMany($results);

      return redirect()->route('purchases.index');
  }


  public function show(Purchase $purchase)
  {
      return view('admin.purchase.index', compact('purchases'));
  }


  public function edit(Purchase $purchase)
  {
      return view('admin.purchase.index', compact('purchases'));
  }


  public function update(PurchaseUpdateRequest $request, Purchase $purchase)
  {
      //$purchase->update($request->all());
      //return redirect()->route('purchases.index');
  }

  public function destroy(Purchase $purchase)
  {
      //$purchase->delete();
      //return redirect()->route('purchases.index');
  }
}
