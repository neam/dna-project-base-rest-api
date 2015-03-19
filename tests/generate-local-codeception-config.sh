#!/bin/bash

script_path=`dirname $0`

export API_HOST=web:80/api # <-- "web" docker virtual host since the api tests are done directly using curl
erb $script_path/codeception/api-v1.suite.yml.erb > $script_path/codeception/api-v1.suite.yml
#erb $script_path/codeception/api-v2.suite.yml.erb > $script_path/codeception/api-v2.suite.yml

exit 0