<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(): View
    {
        $pages = Page::all();

        return view('pages.index', compact('pages'));
    }

    public function create(): View
    {
        return view('pages.index');
    }

    public function store(Request $request): RedirectResponse
    {
        return redirect()->route('pages.index');
    }

    public function show(Page $page): View
    {
        return view('page.index', compact('page'));
    }

    public function edit(Page $page): View
    {
        return view('page.index', compact('page'));
    }

    public function update(Request $request, Page $page): RedirectResponse
    {
        return redirect()->route('pages.index');
    }

    public function destroy(Page $page): RedirectResponse
    {
        return redirect()->route('pages.index');
    }
}
