# php-jenkins-example
PHP static code analysis on Jenkins

## Use it in your own project

Clone repo, remove irrelevant directories and Silex app.

    git clone https://github.com/adambro/php-jenkins-example.git
    rm -r .git/ db/ src/* tests/* www/ composer.lock
    composer remove silex/silex doctrine/dbal symfony/twig-bridge twbs/bootstrap
    composer update

Essentially you get the barebones of a PHP project in git. The most important part 
is wiring between various QA tools (phpmd, phpcpd, phpunit) with their counterpart 
Jenkins plugins. Relevant directories (like `./build/`) and files (like `.gitignore` 
or `phpunit.xml.dist`) are left intact.

# License

The code is released to public domain using Unlicense <http://unlicense.org>
