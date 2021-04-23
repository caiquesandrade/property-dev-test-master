#DEV TEST 

Please make sure when sending the test back it's on a private repository on GitHub and invite the user "dev-houses" to have access to the repo.
Make sure the first commit to the repo the original test.

## DEV SERVER SETUP
- Install Docker and Docker Compose
https://docs.docker.com/compose/install/
  
- Extract the zip file to a folder
- Go to Project root on terminal
- Start Project -``docker-compose up``
- If this is the first time you are setting up the project follow the instructions on "Fist time setup"
- Access Project on http://localhost
- The test instructions can be either found on the home page or the "home.twig" file.
  
### First time setup
- Install composer dependencies:
  - ``docker-compose exec php composer update``
- Create mysql tables:
  - ``docker-compose exec mysql mysql -u root -proot -e "use dev_test; $(cat mysql-database.sql)"``
- Populate tables with data:
  - ``docker-compose exec php bin/console import.properties``
  - ``docker-compose exec php bin/console import.locations``
    





