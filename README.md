# Blog
This project was developed using **PHP 8.1.2** and **Laravel 8**. **Mysql** was used while developing the project.

## Sample Users

- Admin
    - username = admin@example.com
    - password = 123456
- User
    - username = sample@example.com
    - password = 123456

## Contents

- [Additional Propeties](#additional-properties)
- [Create .env File](#create-env-file)
- [Database](#database)
- [Pages](#pages)

## Additional Properties

- A post can have more than one category.
![userPostHasManyCategories](https://i.hizliresim.com/2liuc4l.png)

- Enum is used for user roles in the project.

![userRoleEnum](https://i.hizliresim.com/godnz6j.png)

- Factory and seeder were used to test the database. Thus, user, category, comment and post tables were tested with more than one data. Sample post table:
  ![databasePostTable](https://i.hizliresim.com/mw0k41q.png)



- A post can have more than one comment.


![blogComments](https://i.hizliresim.com/o1n2jkn.png)

-   Admin can assign admin role to users or delete users via control panel.

![adminDashboardUsers](https://i.hizliresim.com/a0q8svo.png)


- The admin role can be changed or deleted from the admin panel.
  ![adminDashboardAdmins](https://i.hizliresim.com/doepc57.png)
 
## Create .env File
    cp .env.example .env

## Database
### Sample Database file
You can download sample database file (.sql) at this [link](https://drive.google.com/drive/folders/1ffn3FLXxOdxTFUXiQC3W9hEeQlS29-Ib?usp=sharing)

### Create Database
    php artisan migrate

 ### Create Database with fake datas
    php artisan migrate --seed

### Database Schema
![blogSchema](https://i.hizliresim.com/jmy22rn.png)

## Pages
### User Register
![userRegisterPage](https://i.hizliresim.com/cg8vkvn.png)
### User Login
![userLoginPage](https://i.hizliresim.com/7ccr63m.png)

### All Posts
![userAllPosts](https://i.hizliresim.com/l8u4jrr.png)

### Post
![blogPost](https://i.hizliresim.com/o1n2jkn.png)

### Post search by category name.
![userSearchPostByCommentName](https://i.hizliresim.com/bumcbh8.png)

### Admin Dashboard All Admins
![adminDashboardAdmins](https://i.hizliresim.com/doepc57.png)

### Admin Dashboard All Users
![adminDashboardUsers](https://i.hizliresim.com/a0q8svo.png)

### Admin Dashboard All Posts
![adminDashboardPosts](https://i.hizliresim.com/fn96p4x.png)

### Admin Dashboard Edit Post
![adminDashboardEditPost](https://i.hizliresim.com/fo6tysj.png)

### Admin Dashboard Create Category
![adminDashboardCreateCategory](https://i.hizliresim.com/nneyuqa.png)

### Admin Dashboard Create Post
![adminDashboardCreatePost](https://i.hizliresim.com/3r6sqzi.png)
