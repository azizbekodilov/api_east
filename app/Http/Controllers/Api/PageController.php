<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function page(Request $request)
    {
        return PageResource::collection(Page::whereHas('pageTranslation', function($q) use($request){
            $q->where('slug', $request->slug);
        })->get());
    }
}
