## About project

- This project fetches nba games from the API and saves into mysql database
- In order to fetch all the data you can launch a command *php artisan api:fetchGames*, nevertheless it is set up to fetch the data daily via kernel scheduling

## Caching

- To improve load speed and user experience the games data is cached with redis cache driver in this case.

## Preview
- Website can be previewed here *http://basketnews.geciauskas.lt/* and here *https://github.com/gecas/basketnews-task*

## Answering question

- Šioje vietoje parašysiu lietuviškai. 
- *Kaip optimizuosite sistemą, jei bus 10, 100, 1000, 10000 naudotojų per minutę?* Atsakymas: esant gan mažoms apkrovoms, tarkime 10 naudotojų per minutę stengčiausi užtikrinti, kad svetainėje optimizuoti paveikslėliai, video bei kita medija, esant 100 naudotojų svarbu sužiūrėti, kad duomenų bazės struktūra yra tinkamai sutvarkyta, t.y.- sudėti indeksai, esant sąryšiams - naudojami foreign keys, taip pat svarbu būtų apkreipti dėmesį į mysql užklausų greitį bei galimybę jas optimizuoti. Esant 1000 naudotojų per minutę svarbu būtų pajungti kešavimo variklį (redis, memcached, etc), o esant 10000 iš patirties manyčiau efektyviausias būdas yra naudoti varnish cache. Taip pat dalis optimizacijos gali atsiremti ir į hardware pusę, kalbu apie serverį, svarbu, kad jis turėtų ssd bei kitus galimus pagreitinimo variantus kaip tarkime Roadrunner ar Swoole.
