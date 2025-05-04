<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function page(Request $request)
    {
        return Page::where('slug', $request)->first();
    }
}
