<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class FormController extends Controller
{
    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $link = Link::create($request->all());

        $request->session()->flash('stored', url($link->link_short));

        return redirect()->route('home');
    }
}
