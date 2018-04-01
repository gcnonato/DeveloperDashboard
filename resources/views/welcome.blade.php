<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{url('css/app.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <main role="main" class="container">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="jumbotron">
                                            <h1 class="display-4">{{ config('app.name') }}</h1>
                                        </div>

                                        <div>
                                            <h1 class="display-6">Podcasts</h1>
                                            <hr />
                                        </div>

                                        <div>
                                            <h1 class="display-6">Resources</h1>
                                            <hr />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
