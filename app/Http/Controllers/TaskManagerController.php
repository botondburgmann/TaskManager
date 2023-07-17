<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Http\Request;

class TaskManagerController extends Controller
{

    public function index()
    {
        return view('welcome', ['listItems' => listItem::orderBy('due_date')->get()]);
    }

    public function store(Request $request)
    {
        $newListItem = new ListItem();
        $newListItem->name = $request->name;
        $newListItem->description = $request->description;
        $newListItem->due_date = $request->due_date;
        $newListItem->is_complete = 0;
        $newListItem->save();

        return redirect('/');
    }

    public function complete($id)
    {
        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();

        return redirect('/');
    }

    public function filterComplete()
    {
        return view('welcome', ['listItems' => listItem::where('is_complete', '=', '1')->orderBy('due_date')->get()]);
    }

    public function filterPending()
    {
        return view('welcome', ['listItems' => listItem::where('is_complete', '=', '0')->orderBy('due_date')->get()]);
    }
}
