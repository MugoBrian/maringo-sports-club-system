<?php

namespace App\Http\Controllers;

use App\Models\SportingItem;
use App\Models\StockItem;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StockItemController extends Controller
{
    //

    public function index()
    {
        $stockItems = StockItem::latest()->filter(request(['search']))->paginate(5);

        return view("store.stockitems.index", ['stockItems' => $stockItems]);
    }

    public function edit(StockItem $stockItem)
    {
        $sportItems = SportingItem::all();
        return view('store.stockitems.edit', [
            'stockitem' => $stockItem,
            'sportItems' => $sportItems
        ]);
    }
    public function create()
    {
        $sportItems = SportingItem::all();


        return view('store.stockitems.create', ['sportItems' => $sportItems]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'quantity' => 'required | numeric',
            'sporting_items_id' => 'required',

        ]);
        // // $data['sporting_items_id'] = $request->input('sporting_items_id');
        // echo dd($request);
        try {
            StockItem::create($data);
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                
                return back()->withErrors('Cannot add the record. It already exists.');
            }
        }
        return redirect('/store/stockitems/')->with('success', 'Your Stock Item has been added!');
    }
    public function update(Request $request, StockItem $stockItem)
    {
        $data = $request->validate([
            'quantity' => 'required | numeric',
            'sporting_items_id' => 'required',

        ]);

        $stockItem->update($data);
        return redirect('/store/stockitems/')->with('success', 'Your Stock Item has been updated!');
    }
    
    public function destroy(StockItem $stockItem)
    {
        $stockItem->delete();
        return redirect('/store/stockitems/')->with('success', 'Your Stock Item has been deleted!');
    }
}
