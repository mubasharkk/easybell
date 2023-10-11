# EasyBell

## Introduction:

This test should take an average of 3h to be done, but you won’t be evaluated by the
amount of time spent but the by the following items:

* Code of quality and readability
* Knowledge of the framework(s)
* Approach taken to solve the test

### Requirements:

Use Laravel and Vue.js (whatever version you prefer) to create a system where the registered
users can favorite or unfavorite photos. The latest favorite photos picked by all registered
users are shown in a page accessible by guest users.

You can use the JsonPlaceholder image API to list all the possible images which the
registered users can pick from. Use a simple pagination to go through all the possible images
(Tip: the api excepts _start and _limit as query parameters).
More information for JsonPlaceholder APIs can be found here.

You can use any other frontend plugin/tool you feel useful to reach the desired outcome.
You may also create tests, use design patterns and anything you believe will enrich your
showcase.

Please commit the code to GitHub and send the repository link to us.


# Solution

* **Backend**
  * All relevant files are in following folders
    * [Domain](https://github.com/mubasharkk/easybell/tree/main/app/Domain)
    * [PhotosController](https://github.com/mubasharkk/easybell/blob/main/app/Http/Controllers/PhotosController.php)
    * [Models](https://github.com/mubasharkk/easybell/tree/main/app/Models)
    * Other than these files nothing is touched. 
    * I decided to store the data from API to database to show my expertise on databases.
    * I have added one single `Feature/PhotosControllerTest`. Because of time I wasn't able to add some extra tests.
* **Frontend**
  * Frontend is build with VueJS and has default setup from Laravel Breeze with VueJs.
  * No extra plugin/libraries are used.
  * All relevant files are in 
    * [resources/js/Pages](https://github.com/mubasharkk/easybell/tree/main/resources/js/Pages)
    * [resources/js/Components](https://github.com/mubasharkk/easybell/tree/main/resources/js/Components)

### Running the app

The application is built on Laravel using Sail.

```
$ composer install && ./vendor/bin/sail up -d
```

### APP URL

`http://localhost/`

### Importing data from Placeholder API

I have mixed the `JsonPlaceHolder` API data with [https://picsum.photos/](https://picsum.photos/) API to have nicer looking photos.

### Importing Data
```
$ ./vendor/bin/sail artisan migrate --seed
```

### Running Test

```
sail artisan test tests/Feature/PhotosControllerTest.php
```
