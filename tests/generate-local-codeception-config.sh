#!/bin/bash

erb codeception.yml.erb > codeception.yml
erb tests/codeception/acceptance.suite.yml.erb > tests/codeception/acceptance.suite.yml

exit 0