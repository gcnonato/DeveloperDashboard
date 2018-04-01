# Developer Dashboard

A Laravel Single page app to show frequently used learning resources.

## Motivations

As a developer you spend many hours learning, so having an area to immediately see what content has been updated, and being able to navigate to this content could be a massive time saver. I originally wanted an area to see podcast updates, and began thinking about other useful features.

The main aims of this developer dashboard is to allow a person to say what they want to study, what applications they use to study, and for these to be easily accessible.

## Setup

- cd into project root
- run ```composer install``` to install the required packages.
- ```cp .env.example .env``` and update values according to your local environment.
- serve the site using your method of choice. ([Homestead](https://laravel.com/docs/5.5/homestead) can be used))
- If needed, run ```npm install``` to install the javascript packages and use ```npm run dev``` to generate the js and scss assets.

## Usage

The [Home Controller](https://github.com/mw999/DeveloperDashboard/blob/master/app/Http/Controllers/HomeController.php) contains declarations of the resources displayed on page. Markup doesn't need to be touched.

- Learning Resources - frequently used learning applications.
- Podcasts - rss feeds for software engineering podcasts.
