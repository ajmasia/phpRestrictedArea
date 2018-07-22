# A simple restricted area with PHP & MySQL

## Requirements / details

- There will be 2 types of users: the Administrator user and the Staff user. They will both access the protected area through a login form page.
- The Administrator will manage Staff users and assign them "policies", which are like client accounts. - Each policy belongs to one Staff user (or none). The Staff user will only see his assigned policies.

**Administrator**:

- When logging in will be taken to the Staff list page. This page shows a list of all current Staff users.
  To create new Staff users the Administrator has to use the "Create account" button, which will ask for a name and email. This will send an email with a unique link that the recipient will use to create a Staff user account.
- Clicking on a row on the Staff list page will take the admin to the Staff details page.
- The Staff detail page will show some basic details about the Staff and the list of policies assigned to him. From there the Administrator can add policy (from a list of existing unallocated ones) or remove existing ones (which will unlink the policy from that Staff user and will make it available for allocation).
- The "Remove Staff" option will remove the user (soft delete) and unlink all his policies.

**Staff**:

- When logging in will be taken to the Staff dashboard page, which will display a list of his policies.
- Clicking on a row on the list of policies will the user to a simple page (nothing fancy) that will display the details of that policy (same information as the table, read only).

The file "policies.sql" contains a basic table for the policies (to be changed if required), that is assumed to contain data to be used as explained above (dummy data can be used for testing).
Dependecies (if any) should be managed with Composer.

## Installation

This app need an Apache or Nginx server engine to work. Before installing this app we must to know the correct parameters to access to database server.

First of all clone this repo on your server using the next command:

`git clone https://github.com/ajmasia/phpRestrictedArea.git`

This project use external dependeces then you need run the next command:

`php composer.phar install`

Now you must create mysql database. You have to use `piranha_db.sql` instructions attached to this project with data samples.

When you will create the database, you must configure the system parameters editing the file `app_config.php`. You can see here an example:

```php
// Database connect
    define('HOST', 'localhost');
    define('USER_NAME', 'root');
    define('PASSWORD', 'root');
    define('PORT', '8889');
    define('DB_NAME', 'pirahna_db');

    // Mail config
    define('MAIL_SERVER', 'smtp.gmail.com');
    define('MAIL_PORT', 465);
    define('MAIL_SECURITY', 'ssl');
    define('MAIL_USER', 'user@gmail.com');
    define('MAIL_PASSWORD', 'user_password');
```

## User data samples

| User              | Password    |
| ----------------- | ----------- |
| admin             | supersegura |
| Erlich Bachman    | At6MW9y     |
| Dinesh            | MEmOGsj     |
| Gavin Belson      | a1iCQGe     |
| Gilfoyle          | 86WzuIT     |
| Richard Hendricks | RyrjVgK     |

# License

## MIT License

Copyright (c) 2018 Antonio José Masiá

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
