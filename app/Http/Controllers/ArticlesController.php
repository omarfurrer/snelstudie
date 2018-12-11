<?php

namespace App\Http\Controllers;

class ArticlesController extends Controller {

    /**
     * Show an article.
     * 
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show()
    {
        return view('articles.show');
    }

}
