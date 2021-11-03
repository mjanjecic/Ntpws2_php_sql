CREATE TABLE `users` (
    `id` int(11) NOT NULL,
    `full_name` varchar(255) NOT NULL DEFAULT '',
    `username` varchar(255) NOT NULL DEFAULT '',
    `password` varchar(255) NOT NULL DEFAULT '',
    `email` varchar(255) NOT NULL DEFAULT '',
    `country_id` varchar(2) NOT NULL DEFAULT '',
    `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE 'users' ADD PRIMARY KEY ('id');

INSERT INTO 'users' ('id', 'full_name', 'username', 'password', 'email', 'country_id', 'date') VALUES
    (1, 'Matija Janjecic', 'mjanjecic', 'UserPass', 'mjanjeci1@tvz.hr', 'HR', '1-1-2021'),
    (2, 'John Doe', 'John', 'password123', 'john.doe@gmail.com', 'GB', '1-2-2021')
;