<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\tag\StoreRequest;
use App\Http\Requests\admin\tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdminTagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.tag', compact('tags'));
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(StoreRequest $request)
    {

        $data = $request->validated();

        Tag::firstOrCreate($data);

        return redirect()->route('admin.tag.index');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();

        Tag::where('id', $tag->id)->update($data);

        return redirect()->route('admin.tag.index');
    }

    public function delete(Tag $tag)
    {
        Tag::where('id', $tag->id)->delete();

        return redirect()->route('admin.tag.index');
    }

}
