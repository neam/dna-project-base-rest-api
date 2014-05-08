## Acceptance tests

Do the following in order to run the acceptance suite:

```bash
cd gapminder-school/cms/tests
./reset-test-db.sh
export CMS_HOST=localhost:31415
./generate-local-codeception-config.sh
java -jar selenium-server-standalone-2.41.0.jar -Dwebdriver.chrome.driver=./chromedriver
./_start-local-server.sh
vendor/bin/codecept run acceptance --debug
```
