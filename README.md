# Developer Dashboard

A Laravel single page app to show frequently used learning resources.

## Motivations

As a developer you spend many hours learning, so having an area to immediately see what content has been updated, and being able to navigate to this content could be a massive time saver. I originally wanted an area to see podcast updates, and began thinking about other useful features.

The main aims of this developer dashboard is to allow a person to say what they want to study, what applications they use to study, and for these to be easily accessible.

An example of my setup can be found [here](https://dashboard.mattywilliams.co.uk/).

## Setup

- cd into project root
- run ```composer install``` to install the required packages.
- ```cp .env.example .env``` and update values according to your local environment.
- serve the site using your method of choice. ([Homestead](https://laravel.com/docs/5.5/homestead) can be used))
- If needed, run ```npm install``` to install the javascript packages and use ```npm run dev``` to generate the js and scss assets.

## Usage

The [Dashboard Config](https://github.com/mw999/DeveloperDashboard/blob/master/config/dashboard.php) contains declarations of the resources displayed on the dashboard. The markup of the page doesn't need to be touched.

- Learning Resources - Frequently used learning applications.
- Docs - Documentation for frequently used libraries.
- Podcasts - RSS feeds for software engineering podcasts.
- Item Count - How many items are shown per podcast.
