

## About project

- This project fetches nba games from the API and saves into mysql database
- In order to fetch all the data you can launch a command *php artisan api:fetchGames*, nevertheless it is set up to fetch the data daily via kernel scheduling

## Caching

- To improve load speed and user experience the games data is cached with redis cache driver in this case.

