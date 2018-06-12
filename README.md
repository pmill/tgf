# GTF

In this file you have a vagrant file which installs a simple database of users and centres and configures an apache host 
which you should be able to access at http://192.168.33.11. The basic scaffold of a website is included in the www 
folder. This includes an empty Javascript file and a service.php file that contains the connection string to the 
database. The local www folder is in sync with the www folder being served by apache on vagrant, so any changes to this 
folder will be reflected in the site.

If you don't have vagrant installed you'll need to download it from https://www.vagrantup.com/downloads.html

Your task is to create a page that displays a sortable list of user names, emails and their centre.

- You can use any frameworks on the front end and back that you but you don't have to.
- Feel free to make it look pretty.
- Do not spend loads of time on this, but show us what you can do.

In your interview we will ask you to do a 10 minute presentation on what you've done, including:

- what you've built 
- how it works
- the decisions you made
- what you would do better and have to consider if this was a real world task

# Installation

```
composer install
vagrant up --provider=virtualbox --provision
```

Then the website should be visible at:

http://192.168.33.11/
