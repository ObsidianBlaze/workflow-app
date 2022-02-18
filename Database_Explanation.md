# How I designed my database

## I created four tables in total
`department`, `level`, `request`, `users`

## Level
The columns on my levels table are
`id`, `level`
Where `level` is used to state the level of the user in the company.
I started the level from 0 and filled it up to 3. This means that users can go from level 0 to level 3.
Where Level 0 is the default and users can start accepting request from level 1 up to level 3.

## Department
The columns on the department table are;
`id`, `dept_name`
Where `dept_name` is the name of the given department, e.g Human Resources.
This table is to handle the intricacies of having multiple departments.

## Users
The columns on the users table are:
`id`, `firstname`, `lastname`, `email`, `level_id`, `dept_id`
Where the `email` is used to uniquely identify each member of the staff.
`level_id` is a foreign key, and it is always default to the lowest level a user can have which is 0.
This can eventually be changed by the Super admin based on the promotion of the user.
So, when the `level_id` points to level 1, a user can start to accept or decline a request.

While the `dept_id` is used as a foreign key in order to write a join statement which would help query users for a particular department.
This would make it in a way that only users with level 1 and above and from the same department can see a request.

## Request
The columns on the request table are:
`id`, `status`,	`user_id`, `request_clearance_level`, `request`	

The `status` is either pending, approved or rejected. Where the default for each created request is pending.
The `user_id` specifies the user making the clearance.
The `request_clearacne_level` starts from 1 as its default value. This is used to write a query to get only users from a department that have level of 1 and above.
This makes only authorized users have the permission to see a request, approve or even reject it.
The `request` column is the body of the request. Could be a request for a sick leave.