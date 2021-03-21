# guessing-be

Guessing Game App Backend by OMDB API.

## Project setup

### Cloning
```
$ git clone https://github.com/rodrigues-t/guessing-be.git
```

## Installing
```
$ cd guessing-be
```
```
$ componser install
```

Rename `.env.example` to `.env`.

### Generating app Key
```
$ php artisan key:generate
```
### Env config
In .env file you need to set the variable `MOVIE_SERVICE_KEY` with your OMDB key.

### Setup MySQL on docker
```
$ docker-compose up -d --build
```

### Migrate
```
$ php artisan migrate
```

## Testing

Make sure you have sqlite installed and extension=pdo_sqlite enabled in php.ini. So, run:  

```
$ php artisan test
```

## Running
```
$ php artisan serve
```






