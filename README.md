# Codeception Demo Application

This demo project has few dependencies, please make sure that you meet those.

* Codeception
    - Install codeception( global installation)
        - ```sudo wget http://codeception.com/codecept.phar -O /usr/local/bin/codecept```
        - ```sudo chmod +x /usr/local/bin/codecept```

* Composer (not necessary)
    - Install composer (global installation)
        - ```curl -sS https://getcomposer.org/installer | php```
        - ```sudo mv composer.phar /usr/local/bin/composer```

After cloning the project,
  - execute the sql file **(db.sql)**
  - create **config/application.ini** file with appropriate database credentials 
  - create **tests/acceptance.suite.yml**
  - create **tests/functional.suite.yml**
  - create **tests/phantomjs.suite.yml**
  - create **tests/unit.suite.yml**

To run **phantomjs** test suite you will either need [Phantom JS](http://phantomjs.org/download.html) or [Selenium Server] (http://selenium-release.storage.googleapis.com/2.45/selenium-server-standalone-2.45.0.jar) 
