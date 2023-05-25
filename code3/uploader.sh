#!/bin/bash
if [ ! -e ./db/filedb.db ]; then
mysql -u root -psecret -h db << SQL
CREATE DATABASE filedb;
USE filedb;
CREATE TABLE srcfiles (
   userid TEXT NOT NULL,
   projectid TEXT NOT NULL,
   srcfile TEXT NOT NULL,
   processed CHAR(1) NOT NULL DEFAULT 'N',
   PRIMARY KEY (userid, projectid, srcfile)
);
SQL
fi
php -S 0.0.0.0:8888
