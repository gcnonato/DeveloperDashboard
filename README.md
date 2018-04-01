# LearningTools

A Laravel Single page app to show frequently used learning resources.

## Setup

- cd into project root
- run ```composer install``` to install the required packages.
- ```cp .env.example .env``` and update values according to your local environment.
- serve the site using your method of choice. ([Homestead](https://laravel.com/docs/5.5/homestead) can be used))
- If needed, run ```npm install``` to install the javascript packages and use ```npm run dev``` to generate the js and scss assets.

## Usage

The [Home Controller](https://github.com/mw999/LearningTools/blob/master/app/Http/Controllers/Home
Controller.php) contains declarations of the resources displayed on page. Markup doesn't need to be touched.

- Learning Resources - frequently used learning applications.
- Podcasts - rss feeds for software engineering podcasts.
