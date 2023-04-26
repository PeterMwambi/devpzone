##System Organization

## Actors

Database Schema
Tables

1. Users
   -BlogHub**user_id
   -BlogHub**user_uuid
   -BlogHub**user_firstname
   -BlogHub**user_lastname
   -BlogHub**user_email
   -BlogHub**user_phoneNumber
   -BlogHub**user_profileImage
   -BlogHub**user_password
   -BlogHub\_\_user_permissionLevel
   -Admin
   -Member

2. Users_profile
   -BlogHub**user_username
   -BlogHub**user_password

3. Blogs
   -BlogHub**blog_title
   -BlogHub**blog_heading
   -BlogHub**blog_dateAdded
   -BlogHub**blog_timeAdded
   -BlogHub**blog_content
   -BlogHub**blog_coverImage
   -BlogHub\_\_blog_id

4. Blog_profile

Status Reports

1. Autoloader is working correctly.
