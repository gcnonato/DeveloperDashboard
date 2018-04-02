<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;
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

        // Library Docs, including their name, link and font awesome icon.
        $docs = config('dashboard.docs');

        // RSS feed URL's for podcasts.
        $podcasts = config('dashboard.podcasts');

        foreach ($podcasts as $key => $podcast) {
            $podcastFeeds[$key] = Feeds::make($podcast);
        }

        // Youtube videos, a set number of videos are returned from each
        // channel.
        $channels = config('dashboard.channels');
        $videoCount = config('dashboard.video_count');

        foreach ($channels as $key => $channel) {
            $foundChannel = Youtube::getChannelByName($channel);

            if (!$foundChannel) {
                $foundChannel = Youtube::getChannelById($channel);
            }

            $channelId = $foundChannel->id;
            $channelList[$key] = Youtube::listChannelVideos($channelId, $videoCount);
        }

        return view('welcome', compact('resources', 'docs', 'podcastFeeds', 'channelList'));
    }
}
