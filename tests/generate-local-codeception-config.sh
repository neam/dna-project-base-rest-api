#!/bin/bash

script_path=`dirname $0`

erb $script_path/codeception.yml.erb > $script_path/codeception.yml
erb $script_path/codeception/acceptance-init.suite.yml.erb > $script_path/codeception/acceptance-init.suite.yml
erb $script_path/codeception/acceptance.suite.yml.erb > $script_path/codeception/acceptance.suite.yml
erb $script_path/codeception/api.suite.yml.erb > $script_path/codeception/api.suite.yml

exit 0