CREATE DATABASE ITJOB

GO
USE ITJOB
GO	

CREATE TABLE role
(
	id INT IDENTITY NOT NULL PRIMARY KEY,
	name VARCHAR(100) NOT NULL UNIQUE,
	created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL,
	deleted_at DATETIME NOT NULL,
)

CREATE TABLE skill
(
	id INT IDENTITY NOT NULL PRIMARY KEY,
	name VARCHAR(100) NOT NULL UNIQUE,
	created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL,
	deleted_at DATETIME NOT NULL,
)

CREATE TABLE level
(
	id INT IDENTITY NOT NULL PRIMARY KEY,
	name VARCHAR(100) NOT NULL UNIQUE,
	created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL,
	deleted_at DATETIME NOT NULL,
)

CREATE TABLE [user]
(
	id INT IDENTITY NOT NULL PRIMARY KEY,
	name NVARCHAR(100) NOT NULL,
	username NVARCHAR(100) NOT NULL UNIQUE,
	email NVARCHAR(100) UNIQUE NOT NULL,
	phone INT UNIQUE NOT NULL,
	address NVARCHAR(100) NOT NULL,
	img_avatar VARCHAR(100) NOT NULL,
	position NVARCHAR(100) NOT NULL,
	description NVARCHAR(100) NOT NULL,
	password VARCHAR(100) NOT NULL,
	provider VARCHAR(30) NOT NULL,
	token VARCHAR(100) NOT NULL,
	role_id INT NOT NULL,
	skill_id INT NOT NULL,
	created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL,
	deleted_at DATETIME NOT NULL,

	FOREIGN KEY(role_id) REFERENCES dbo.role(id),
)

CREATE TABLE company
(
	id INT IDENTITY NOT NULL PRIMARY KEY,
	name NVARCHAR(100) NOT NULL,
	username NVARCHAR(100) NOT NULL UNIQUE,
	email NVARCHAR(100) UNIQUE NOT NULL,
	type VARCHAR(20) NOT NULL,
	staff INT NOT NULL,
	headquarters NVARCHAR(200) NOT NULL,
    taxcode VARCHAR(50) NOT NULL,
	img_avatar VARCHAR(100) NOT NULL,
	address NVARCHAR(100) NOT NULL,
	description NVARCHAR(100) NOT NULL,
	password VARCHAR(100) NOT NULL,
	token VARCHAR(100) NOT NULL,
	role_id INT NOT NULL,
	created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL,
	deleted_at DATETIME NOT NULL,
	
	FOREIGN KEY(role_id) REFERENCES dbo.role(id)
)


CREATE TABLE post
(
	id INT IDENTITY NOT NULL PRIMARY KEY,
	title NVARCHAR(200) NOT NULL,
    count INT NOT NULL,
    status INT NOT NULL,
    approved_user_id INT NOT NULL,
    level_id INT NOT NULL,
	skill_id INT NOT NULL,
	company_id INT NOT NULL,
	created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL,
	deleted_at DATETIME NOT NULL,

	FOREIGN KEY(skill_id) REFERENCES dbo.skill,
	FOREIGN KEY(company_id) REFERENCES dbo.company(id),
    FOREIGN KEY(level_id) REFERENCES dbo.level(id)
)

CREATE TABLE description_information
(
    id INT IDENTITY NOT NULL PRIMARY KEY,
    content NVARCHAR(30) NOT NULL,
    post_id INT NOT NULL,
    created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL,
	deleted_at DATETIME NOT NULL,

    FOREIGN KEY(post_id) REFERENCES dbo.post(id)
)

CREATE TABLE requirements_information
(
    id INT IDENTITY NOT NULL PRIMARY KEY,
    content NVARCHAR(30) NOT NULL,
    post_id INT NOT NULL,
    created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL,
	deleted_at DATETIME NOT NULL,

    FOREIGN KEY(post_id) REFERENCES dbo.post(id)
)

CREATE TABLE benefit_information
(
    id INT IDENTITY NOT NULL PRIMARY KEY,
    content NVARCHAR(30) NOT NULL,
    post_id INT NOT NULL,
    created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL,
	deleted_at DATETIME NOT NULL,

    FOREIGN KEY(post_id) REFERENCES dbo.post(id)
)

CREATE TABLE education_information
(
	id INT IDENTITY NOT NULL PRIMARY KEY,
	content NVARCHAR(30) NOT NULL,
    user_id INT NOT NULL,
	created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL,
	deleted_at DATETIME NOT NULL,

    FOREIGN KEY(user_id) REFERENCES dbo.[user](id)
)

CREATE TABLE experience_information
(
	id INT IDENTITY NOT NULL PRIMARY KEY,
	content NVARCHAR(200) NOT NULL,
    user_id INT NOT NULL,
	created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL,
	deleted_at DATETIME NOT NULL,

    FOREIGN KEY(user_id) REFERENCES dbo.[user](id)
)

CREATE TABLE skill_information
(
	id INT IDENTITY NOT NULL PRIMARY KEY,
	user_id INT NOT NULL,
    post_id INT NOT NULL,
 	skill_id INT NOT NULL,
	created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL,
	deleted_at DATETIME NOT NULL,

	FOREIGN KEY(user_id) REFERENCES dbo.[user](id),
    FOREIGN KEY(post_id) REFERENCES dbo.post(id),
	FOREIGN KEY(skill_id) REFERENCES dbo.skill(id),
)

CREATE TABLE email
(
    id INT IDENTITY NOT NULL PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    sent_user_id INT NOT NULL,
    content NVARCHAR(200) NOT NULL,

    FOREIGN KEY(sent_user_id) REFERENCES dbo.[user](id)
)

CREATE TABLE review
(
    id INT IDENTITY NOT NULL PRIMARY KEY,
    content NVARCHAR(100) NOT NULL,
    star INT NOT NULL,
    user_id INT NOT NULL,
    created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL,
	deleted_at DATETIME NOT NULL,

    FOREIGN KEY(user_id) REFERENCES dbo.[user](id)
)

CREATE TABLE report
(
    id INT IDENTITY NOT NULL PRIMARY KEY,
    content NVARCHAR(100) NOT NULL,
    user_id INT NOT NULL,
    created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL,
	deleted_at DATETIME NOT NULL,

    FOREIGN KEY(user_id) REFERENCES dbo.[user](id)
)

CREATE TABLE contact
(
    id INT IDENTITY NOT NULL PRIMARY KEY,
    name NVARCHAR(100) NOT NULL,
    email NVARCHAR(100) NOT NULL,
    content NVARCHAR(100) NOT NULL,
    user_id INT NOT NULL,
    created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL,
	deleted_at DATETIME NOT NULL

    FOREIGN KEY(user_id) REFERENCES dbo.[user](id)
)
