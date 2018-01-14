# Welcome to LibreAtlas!
Atlas for all LibreHealth users' locations and related information!

This software aims the unification of all locations of all users currently using LibreHealth softwares.
Those softwares when installed will send a request to a REST API (included in LibreAtlas) to add its associated marker.

REST API Guide can be found in API.md.

## Setup

0. Make sure you've got an available web server for this (with PHP, MySQL and Apache). Wampserver is recommended.

1. It is required to create a database for this software. A file is provided (db.sql) which does that for you.

2. You need to set up some basic variables in settings.php like:
  * App's name (which will be used on the whole software
  * App's folder (this one is extremely important) >> example: atlas.librehealth.io/libreatlas > "libreatlas" | atlas.librehealth.io > "" (empty string)
  * Google Maps API KEY >> get your own at https://developers.google.com/maps/documentation/javascript/adding-a-google-map#key
  * Database credentials
  
3. Run the software on your address bar and contribute!

## Help

If you have a suggestion, contact us OR create an issue OR a pull request.
Any question/problem, contact us also.

@author MigDinny https://github.com/MigDinny
