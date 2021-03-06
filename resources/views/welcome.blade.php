<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Styles -->
        <link href="{{ url('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <nav id="top" class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#podcasts">Podcasts</a>
                    </li>
                    <li class="nav-item"><p class="nav-link active" style="margin-bottom: 0px">|</p></li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#videos">Videos</a>
                    </li>
                    <li class="nav-item"><p class="nav-link active" style="margin-bottom: 0px">|</p></li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#blogs">Blogs</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="container">
            <a href="#top" style="display: none;" class="scrollToTop"><i class="fas fa-arrow-circle-up fa-3x"></i></a>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="jumbotron">
                                <div class="row">
                                    <div class="col-xs-12 col-md-8 col-lg-8">
                                        <h1 class="display-4">{{ config('app.name') }}</h1>
                                        <p class="lead">A place to navigate frequently used learning resources.</p>
                                    </div>

                                    <div class="col-xs-12 col-md-4 col-lg-4">
                                        <button onClick="buttonLoad('{{ route('random') }}');" class="btn btn-dark btn-lg random-btn" id="load">
                                            <div class="mb-2">
                                                Learn Something Random
                                            </div>
                                            <div>
                                                <i class="fas fa-question fa-3x"></i>
                                            </div>
                                        </button>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-6 mb-4">
                                        <h4>Resources</h4>
                                        @foreach($resources as $resource)
                                            <a class="btn btn-dark btn-lg resource" href="{{ $resource['link'] }}" target="_blank" role="button"><i class="{{ $resource['icon'] }}"></i> {{ $resource['title'] }}</a>
                                        @endforeach
                                    </div>

                                    <div class="col-xs-12 col-md-6 col-lg-6">
                                        <h4>Docs</h4>
                                        @foreach($docs as $doc)
                                            <a class="btn btn-dark btn-lg resource" href="{{ $doc['link'] }}" target="_blank" role="button"><i class="{{ $doc['icon'] }}"></i> {{ $doc['title'] }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="podcasts" class="card mb-4">
                        <div class="card-body">
                            <div>
                                <h1 class="display-4">Podcasts</h1>
                                <hr />

                                @foreach($podcastFeeds as $feed)
                                    <div class="blog">
                                        <div class="blog-feed">
                                            <h2 class="mb-3"><a href="{{ $feed->get_permalink() }}" target="_blank">{{ $feed->get_title() }}</a></h2>
                                        </div>
                                            <div class="row">
                                                @foreach(array_slice($feed->get_items(), 0, config('dashboard.podcast_item_count')) as $item)
                                                    <div class="col-xs-12 col-md-6 col-lg-6">
                                                        <h4><a href="{{ $item->get_permalink() }}" target="_blank">{{ $item->get_title() }}</a></h4>
                                                        <p>{{ substr($item->get_description(), 0, 200) }}...</p>
                                                        <p><small>Posted on {{ $item->get_date('j F Y | g:i a') }}</small></p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    <hr />
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div id="videos" class="card mb-4">
                        <div class="card-body">
                            <div>
                                <h1 class="display-4">Videos</h1>
                                <hr />
                            </div>

                            @foreach ($channelList as $channelVideos)
                                <div class="video">
                                    <div class="feed">
                                        <h2 class="mb-3"><a href="https://www.youtube.com/channel/{{ $channelVideos[0]->snippet->channelId  }}/videos" target="_blank">{{ $channelVideos[0]->snippet->channelTitle }}</a></h2>
                                    </div>

                                    @foreach ($channelVideos as $video)
                                        <div class="video-holder">
                                            <iframe class="youtube"
                                            src="//www.youtube.com/embed/{{ $video->id->videoId }}"
                                            frameborder="0"
                                            allow="autoplay; encrypted-media"
                                            allowfullscreen>
                                            </iframe>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                            <hr />
                        </div>
                    </div>

                    <div id="blogs" class="card mb-4">
                        <div class="card-body">
                            <div>
                                <h1 class="display-4">Blogs</h1>
                                <hr />

                                @foreach($blogFeeds as $feed)
                                    <div class="podcast">
                                        <div class="feed">
                                            <h2 class="mb-3"><a href="{{ $feed->get_permalink() }}" target="_blank">{{ $feed->get_title() }}</a></h2>
                                        </div>
                                            <div class="row">
                                                @foreach(array_slice($feed->get_items(), 0, config('dashboard.podcast_item_count')) as $item)
                                                    <div class="col-xs-12 col-md-6 col-lg-6">
                                                        <h4><a href="{{ $item->get_permalink() }}" target="_blank">{{ $item->get_title() }}</a></h4>
                                                        <p>{!! substr($item->get_description(), 0, 200) !!}...</p>
                                                        <p><small>Posted on {{ $item->get_date('j F Y | g:i a') }}</small></p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    <hr />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>

    <!-- View Source SVG -->
    <a href="https://github.com/mw999/DeveloperDashboard" class="github-corner" aria-label="View source on Github">
        <svg width="80" height="80" viewBox="0 0 250 250" style="fill:#151513; color:#fff; position: absolute; top: 0; border: 0; right: 0;" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path>
        </svg>
    </a>
    <style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}
    </style>

    <!-- Scripts -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <script src="{{ url('js/app.js') }}"></script>
</html>
