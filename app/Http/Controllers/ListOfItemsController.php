<?php

namespace App\Http\Controllers;

use App\Models\SportingItem;
use Illuminate\Http\Request;

class ListOfItemsController extends Controller
{
    //

    public function index()
    {
        $sportItems = SportingItem::latest()->filter(request(['search']))->paginate(4);
        return view('store.listofitems.index', ['sportItems' => $sportItems]);
    }

    public function create()
    {

        return view('store.listofitems.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'amount' => 'required | numeric',

        ]);

        SportingItem::create($data);

        return redirect('/store/listofitems')->with('success', 'Sporting Items Created successfully!');
    }

    public function update(Request $request, SportingItem $sportingitem)
    {
        $data = $request->validate([
            'name' => 'required',
            'amount' => 'required | numeric',

        ]);

        $sportingitem->update($data);

        return redirect('/store/listofitems')->with('success', 'Sporting Items updated successfully!');

    }

    public function edit(SportingItem $sportingitem)
    {
        return view('store.listofitems.edit', ['sportingitem' => $sportingitem]);
    }

    public function destroy(SportingItem $sportingitem)
    {
        $sportingitem->delete();

        return redirect('/store/listofitems')->with('success', 'Sporting Items deleted successfully!');
    }
}
