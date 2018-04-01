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
            'https://responsivewebdesign.com/podcast/feed.xml',
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

        // Library Docs, including their name, link and fontawesome icon.
        $docs = [
            [
                'title' => 'Laravel',
                'link' => 'https://laravel.com/docs/5.6',
                'icon' => 'fab fa-laravel',
            ],
            [
                'title' => 'React',
                'link' => 'https://reactjs.org/docs/',
                'icon' => 'fab fa-react'
            ],
        ];

        foreach ($podcasts as $key => $podcast) {
            $podcastFeeds[$key] = Feeds::make($podcast);
        }

        return view('welcome', compact('resources', 'docs', 'podcastFeeds'));
    }
}
