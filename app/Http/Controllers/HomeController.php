<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Alaouy\Youtube\Facades\Youtube;
use Feeds;

class HomeController extends Controller
{
    /**
     * Get all learning resources for the user, defined in config.dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function learningMaterials()
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

        return [
            'resources' => $resources,
            'docs' => $docs,
            'podcastFeeds' => $podcastFeeds,
            'channelList' => $channelList,
        ];
    }

    /**
     * Show the landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = $this->learningMaterials();
        $resources = $materials['resources'];
        $docs = $materials['docs'];
        $podcastFeeds = $materials['podcastFeeds'];
        $channelList = $materials['channelList'];

        return view('welcome', compact('resources', 'docs', 'podcastFeeds', 'channelList'));
    }

    /**
     * Show a random learning resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function random()
    {
        $materials = $this->learningMaterials();
        $resources = $materials['resources'];
        $docs = $materials['docs'];
        $podcastFeeds = $materials['podcastFeeds'];
        $channelList = $materials['channelList'];

        $links = [];

        // Resource links
        foreach ($resources as $key => $resource) {
            array_push($links, $resource['link']);
        }

        // Documentation links
        foreach ($docs as $key => $doc) {
            array_push($links, $doc['link']);
        }

        // Podcast links
        foreach ($podcastFeeds as $key => $feed) {
            foreach (array_slice($feed->get_items(), 0, config('dashboard.item_count')) as $item) {
                array_push($links, $item->get_permalink());
            }
        }

        // Youtube video links
        foreach ($channelList as $channelVideos) {
            foreach ($channelVideos as $video) {
                array_push($links, 'www.youtube.com/embed/' . $video->id->videoId);
            }
        }

        $randomLink = $links[array_rand($links)];
        return Redirect::away($randomLink);
    }
}
