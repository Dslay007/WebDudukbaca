<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    public function index(Request $request)
    {
        $query = Topic::query();

        if ($request->has('search')) {
            $query->where('topic', 'like', "%{$request->search}%");
        }

        $topics = $query->orderBy('last_update', 'desc')->paginate(15);

        return view('admin.topic.index', compact('topics'));
    }

    public function create()
    {
        return view('admin.topic.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required|string|max:50',
            'topic_type' => 'required|string|in:t,g,n,s,o', 
        ]);

        $topic = new Topic();
        $topic->topic = $request->topic;
        $topic->topic_type = $request->topic_type;
        $topic->auth_list = ''; // Default empty
        $topic->input_date = now();
        $topic->last_update = now();
        $topic->save();

        return redirect()->route('admin.topic.index')->with('success', 'Subject added successfully.');
    }

    public function edit($id)
    {
        $topic = Topic::findOrFail($id);
        return view('admin.topic.edit', compact('topic'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'topic' => 'required|string|max:50',
            'topic_type' => 'required|string|in:t,g,n,s,o',
        ]);

        $topic = Topic::findOrFail($id);
        $topic->topic = $request->topic;
        $topic->topic_type = $request->topic_type;
        $topic->last_update = now();
        $topic->save();

        return redirect()->route('admin.topic.index')->with('success', 'Subject updated successfully.');
    }

    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();
        return redirect()->route('admin.topic.index')->with('success', 'Subject deleted successfully.');
    }
}
