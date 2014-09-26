#!/bin/bash

script_path=`dirname $0`

export CMS_HOST=127.0.0.1:11111
export API_HOST=$LOCAL_SERVICES_IP:11111 # <-- since the api tests are done directly using curl
erb $script_path/codeception/api.suite.yml.erb > $script_path/codeception/api.suite.yml

exit 0