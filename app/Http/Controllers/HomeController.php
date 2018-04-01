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
        // RSS feed URL's for podcasts.
        $podcasts = [
            'https://softwareengineeringdaily.com/feed/podcast/',
            'http://www.pwop.com/feed.aspx?show=dotnetrocks&filetype=master',
        ];

        // Learning resources, including their name, link and fontawesome icon.
        $resources = [
            [
                'title' => 'GitHub',
                'link' => 'https://github.com',
                'icon' => 'fab fa-github'
            ],
            [
                'title' => 'Laracasts',
                'link' => 'https://laracasts.com/',
                'icon' => 'fab fa-laravel',
            ],
            [
                'title' => 'Scrimba',
                'link' => 'https://scrimba.com',
                'icon' => 'fab fa-css3-alt',
            ],
        ];

        foreach ($podcasts as $key => $podcast) {
            $podcastFeeds[$key] = Feeds::make($podcast);
        }

        return view('welcome', compact('podcastFeeds', 'resources'));
    }
}
