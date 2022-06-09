<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Service\LinkService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LinkController extends Controller
{

    /**
     * @param $link
     * @return RedirectResponse
     */
    public function index($link): RedirectResponse
    {
        abort_if((new LinkService())->getStringLength() != strlen($link), 404);

        $model = Link::query()
            ->linkShort($link)
            ->available()
            ->firstOrFail();

        return redirect()->away($model->link);
    }
}
