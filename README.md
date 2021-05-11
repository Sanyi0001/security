## Steps

1. 

2. The application contains one or more features that require access control that prevent IDOR:
    
    Even if tampering with the URL, if the user has insufficient authorisation for accessing a webpage, he will be redirected to the login page or gets a "403 unauthorized" error.

    The application has 3 access levels

        ->Minimum access: Guest

            With this level the user can only access the home page by clicking the "Home" button or the car button in the navbar.
            In this level the user won't be authenticated.

        ->Medium access: User

            With this level the user can also click to the "Cars" button in the navbar and gain access to a table containing
            the car's details. In this level the user has to authenticate themself. Registration is possible and needed in
            order to access this level.

        ->Maximum access: Admin

            With this level the admin can also adit the car's details in the database. For the admin a 4. column will be
            visible, containing an edit button, to edit or delete a car. Also, the admin has a "Create new" button to
            add new cars to the database. Registration is not possible of course for admin. The admin can log in with
            the following test details:

                ->Email : admin@admin.com

                ->Password : jpTRvS-&#q6q7G2W (It is strongly recommended to modify this password in Production when the admin's
                email is replaced with a valid email address. When entering the new password the 'strong password policy'
                is enforced of course.)