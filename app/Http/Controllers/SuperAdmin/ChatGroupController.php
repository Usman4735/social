<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ChatGroup;
use Illuminate\Http\Request;

class ChatGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chat_groups = ChatGroup::all();
        return view("super-admin.chat-groups.index", compact("chat_groups"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Admin::where("role", "admin")->orWhere("role", "manager")->get();
        return view("super-admin.chat-groups.add", compact("members"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chat_group = new ChatGroup();
        $chat_group->group_name = $request->group_name;
        if(isset($request->group_members)) {
            $chat_group->group_members = implode(",", $request->group_members);
        }
        $chat_group->save();
        return redirect("sa1991as/chat-groups")->with("success", "A chat group has been added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChatGroup  $chatGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ChatGroup $chatGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChatGroup  $chatGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chat_group = ChatGroup::findOrFail(decrypt($id));
        $members = Admin::where("role", "admin")->orWhere("role", "manager")->get();
        return view("super-admin.chat-groups.edit", compact("chat_group", "members"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChatGroup  $chatGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $chat_group = ChatGroup::findOrFail(decrypt($id));
        $chat_group->group_name = $request->group_name;
        if(isset($request->group_members)) {
            $chat_group->group_members = implode(",", $request->group_members);
        }
        $chat_group->save();
        return redirect("sa1991as/chat-groups")->with("success", "A chat group has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChatGroup  $chatGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chat_group = ChatGroup::findOrFail(decrypt($id));
        $chat_group->delete();
        return redirect("sa1991as/chat-groups")->with("error", "A chat group has been deleted");
    }
}
