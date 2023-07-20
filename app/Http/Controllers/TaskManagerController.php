<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskManagerController extends Controller
{

    public function index()
    {
        return view('welcome', ['listItems' => listItem::orderBy('due_date')->get()]);
    }

    public function store(Request $request)
    {
        $newListItem = new ListItem();
        $newListItem->user_id = Auth::id();
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

    public function incomplete($id)
    {
        $listItem = ListItem::find($id);
        $listItem->is_complete = 0;
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

    public function edit(ListItem $listItem)
    {
        return view('edit', ['listItem' => $listItem]);
    }

    public function update(Request $request, ListItem $listItem)
    {
        // Make sure logged in user is owner

        if ($listItem->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }



        $listItem->name = $request->name;
        $listItem->description = $request->description;
        $listItem->due_date = $request->due_date;
        $listItem->save();

        return redirect('/');
    }

    // Delete Listing
    public function destroy(ListItem $listItem)
    {
        // Make sure logged in user is owner

        if ($listItem->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $listItem->delete();
        return redirect('/');
    }
}
