<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    public function show($path)
    {
        $content = Content::where('content_path', $path)->orWhere('content_id', $path)->firstOrFail();

        return view('content.show', compact('content'));
    }
}
