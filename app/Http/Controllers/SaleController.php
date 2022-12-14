<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Client;
use Illuminate\Http\Request;

Use App\Http\Requests\SaleStoreRequest;
Use App\Http\Requests\SaleUpdateRequest;

class SaleController extends Controller
{
    public function index()
    {

          $sales = Sale::get();
        return view('admin.sale.index', compact('sales'));
    }


    public function create()
    {
      $clients = Client::get();
      return view('admin.sale.create', compact('clients'));
    }


    public function store(SaleStoreRequest $request)
    {
        $sale = Sale::create($request->all());

        foreach ($request->product_id as $key => $product)
        {
          $results[] =array(
              "product_id"=>$request->product_id[$key],
              "quantity"=>$request->quantity[$key],
              "price"=>$request->price[$key],
              "discount"=>$request->price[$key],
            );
        }

        $sale->SaleDetails()->createMany($results);

        return redirect()->route('sales.index');
    }


    public function show(Sale $sale)
    {
        return view('admin.sale.index', compact('sales'));
    }


    public function edit(Sale $sale)
    {
        $clients = Client::get();
        return view('admin.sale.index', compact('sales'));
    }


    public function update(SaleUpdateRequest $request, Sale $sale)
    {
        //$sale->update($request->all());
        //return redirect()->route('sales.index');
    }

    public function destroy(Sale $sale)
    {
        //$sale->delete();
        //return redirect()->route('sales.index');
    }
  }
