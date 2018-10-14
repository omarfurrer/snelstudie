<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

    /**
     * Get Home page.
     * 
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function getHome()
    {
        return view('pages.home');
    }

    /**
     * Get About Us page.
     * 
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function getAboutUs()
    {
        return view('pages.about_us');
    }

    /**
     * Get Contact Us page.
     * 
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function getContactUs()
    {
        return view('pages.contact_us');
    }

    /**
     * Get How It Works page.
     * 
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function getHowItWorks()
    {
        return view('pages.how_it_works');
    }

}
