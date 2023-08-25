# Installing TYPO3 with Docker Compose and linkdate Extension

This guide will walk you through the steps to install TYPO3 using Docker Compose and then install the linkdate extension.

## Prerequisites

- Docker and Docker Compose are installed on your machine.

## Installation Steps

1. Clone the TYPO3 Docker Compose repository:

```bash
   git clone git@github.com:ionasrobert/testproject.git
```

create a .env file on the root folder with the variables
```
MYSQL_USER=typo3
MYSQL_PASSWORD=your_password
MYSQL_DATABASE=typo3
```
run the following commands and set the user password as above

```bash
   docker-compose up -d

```

Access the link http://localhost:8000 and install the TYPO3

Install the extension linkdate from Extensions and add to a new page 

Access the page to see the links
In backend add some records and see the page http://localhost/newpage
