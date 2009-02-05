#!/bin/sh

cd /usr/lib/rssowl &&
#MOZILLA_FIVE_HOME=${MOZILLA_FIVE_HOME:=`cat /etc/ld.so.conf.d/xulrunner.conf`} exec ./RSSOwl
exec ./RSSOwl
