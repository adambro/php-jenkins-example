# php-jenkins-example
PHP static code analysis on Jenkins

## Use it in your own project

Clone repo, remove irrelevant directories and Silex app.

    git clone https://github.com/adambro/php-jenkins-example.git
    rm -r .git/ db/ src/ tests/ www/ composer.lock
    composer remove silex/silex doctrine/dbal
    composer update
