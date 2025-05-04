<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageTranslation;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function page(Request $request)
    {
        return PageTranslation::where('slug', $request)->where('locale', app()->setLocale('ru'))->first();
    }
}
