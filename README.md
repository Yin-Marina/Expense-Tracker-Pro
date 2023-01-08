# Project name and introduction 

This project, Expence Tracker Pro, is originally an assingment for the web programming course at Algonquin College.

The project is a website that enables users to record their spendings, and manage these records. 

The project uses a bunch of different frameworks and languages, including HTML5, CSS, Bootstrap, JavaScript, PHP and SQL. It originally hosted locally and runs on XAMPP, but is intended to be moved to another hosting service.

This project is originally the work of 3 team members:
- Mutao Yin 
- Dongni Du 
- Xiaozhou Liu

And is now maintained by Mutao Yin.

If you have any questions, please contact me at yin00053@algonquinlive.com or mutao.me@gmail.com.

# Table of Contents

1. Web Map

2. Wirefarme

3. Functionality Guide

4. Description of the database

5. Data defination code

# Web map

![[Pasted image 20230107202136.png]]


# Wireframe


![[Pasted image 20230107202157.png]]

# Functionality Guide
1.  Visit the Website Home page, new users can click “About Us” to realize our company and then click “Sign up” bottom to create a new account.
2.  When a new user “Sign up”, they need to fill up “First name”, “Last name”, “Valid Email” and “Password”.
3.  After Signing up for a new account or existing user, you can click the Home page “Login” icon, then go to the login page to sign in.
4.  When a user signs in successfully, a “Welcome page” will show up, this page includes several icons:

-  Dashboard: show the user’s transaction numbers and the total amount
- Profile: show the user’s account information
- View Report: users can realize their expense report on this page, and search or filter the expense details according to different conditions. In addition, users can edit or delete their expense details in the report by clicking the “Edit” or “Delete” icons at the end of each record line.
- New expense: user can add new expenses including, expense type, date, and amount, and also can add a note as well.

5.  When a user finished all the modifications, can click the “log out” icon to sign out.

# Description of the database

Our “[expense_tracker_pro](http://localhost/phpmyadmin/index.php?route=/database/structure&db=expense_tracker_pro)” database has three tables, transactions, types and users table.

One user can have many transactions, one transaction just has one type.

Transaction Table: Record user’s spendings

Types Table: Identify type of spendings

Users Table: Record user profile

# Database definition code (DDL for the tables)

```SQL
CREATE TABLE `transactions` (

  `id` int(11) NOT NULL,

  `userId` int(11) NOT NULL,

  `date` date DEFAULT NULL,

  `amount` float NOT NULL,

  `typeId` int(11) NOT NULL,

  `notes` varchar(100) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `types` (

  `id` int(11) NOT NULL,

  `name` varchar(20) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (

  `id` int(11) NOT NULL,

  `firstName` varchar(10) NOT NULL,

  `lastName` varchar(10) NOT NULL,

  `email` varchar(20) NOT NULL,

  `password` varchar(10) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `transactions`

  ADD PRIMARY KEY (`id`),

  ADD KEY `typeId` (`typeId`),

  ADD KEY `userId` (`userId`);

--

-- Indexes for table `types`

--

ALTER TABLE `types`

  ADD PRIMARY KEY (`id`);

--

-- Indexes for table `users`

--

ALTER TABLE `users`

  ADD PRIMARY KEY (`id`);

--

-- AUTO_INCREMENT for dumped tables

--

-- AUTO_INCREMENT for table `transactions`

--

ALTER TABLE `transactions`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--

-- AUTO_INCREMENT for table `types`

--

ALTER TABLE `types`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--

-- AUTO_INCREMENT for table `users`

--

ALTER TABLE `users`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--

-- Constraints for dumped tables

--

-- Constraints for table `transactions`

--

ALTER TABLE `transactions`

  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`typeId`) REFERENCES `types` (`id`),

  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

COMMIT;
```
