<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Feeds;

class HomeController extends Controller
{
    /**
     * Show the landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Learning resources, including their name, link and font awesome icon.
        $resources = config('dashboard.resources');

        // Library Docs, including their name, link and fontawesome icon.
        $docs = config('dashboard.docs');

        // RSS feed URL's for podcasts.
        $podcasts = config('dashboard.podcasts');

        foreach ($podcasts as $key => $podcast) {
            $podcastFeeds[$key] = Feeds::make($podcast);
        }

        return view('welcome', compact('resources', 'docs', 'podcastFeeds'));
    }
}
