# Install
* <code>git clone https://github.com/csilviu/mindgeek-showcase.git _desired_folder_</code>
* <code>cd _desired_folder_</code>
* <code>composer install</code>
* for unit tests: <code>php ./bin/phpunit</code>
* <code>cd public</code>
* folder <code>public/images</code> must be writeable
* <code>php -S 127.0.0.1:8008</code>
* navigate in browser to <code>127.0.0.1:8008</code>

# To Do

* more unittests coverage
* add videos
* separate page for movie details

# Requirement

You will need to write a program that downloads all the items in https://mgtechtest.blob.core.windows.net/files/showcase.json and cache images within each asset. To make it efficient, it is desired to only call the URLs in the JSON file only once. Demonstrate, by using a framework of your choice, your software architectural skills. How you use the framework will be highly important in the evaluation.

How you display the feed and how many layers/pages you use is up to you, but please ensure that we can see the complete list and the details of every item. You will likely hitsome road blocks and errors along the way, please use your own initiative to deal with these issues, it’s part of the test.

Please ensure all code is tested before sending it back, it would be good to also see unit tests too. Ideally, alongside supplying the code base and all packages/libraries required to deploy, you will also have to supply deployment instructions too.