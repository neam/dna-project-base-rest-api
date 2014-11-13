Gapminder CMS REST API
====================

Versioned API:s used by Gapminder frontends.

## Tests

### Test suites

* `api-v1` - Contains acceptance tests that verify various aspects of version 1 of the REST API.

### Test groups

#### data

We want to be able to develop/test the code both starting from an empty database, and with data imported from a production deployment. These two testing-data-scenarios are referred to as "clean-db" vs "user-generated", and all acceptance tests are grouped into one or both of these.

* `clean-db`
* `user-generate`

#### coverage

We group all tests based on how much testing coverage is required, so that builds and tests can run faster in cases when full test coverage is not essential:

* `minimal` - The minimal set of tests (default setting for automatic tests in feature branches and on develop)
* `basic` - A little more refined set of tests (default setting for automatic tests in release branches and for production)
* `full` - Includes registering of test users and the life cycle scenario tests (default setting for developers running local tests)
* `paranoid` - Includes long-running tests that were created to protect against various regressions (it is recommended for developers to run these tests locally before finishing a feature branch)

### Running tests locally

Make sure to have api-mock installed:

    npm -g install api-mock

#### Using the _test.sh script

Note: To run acceptance tests, you need to have a selenium server running locally (see below in readme).

First, step into the path of this README.

    cd yiiapps/rest-api/

All tests can be run in sequence (for both clean-db and user-generated) by running the following:

    cd tests
    source _before-test.sh
    ./_test.sh

It will default to `COVERAGE=full`. To override, set the COVERAGE env var before running the script, for instance:

    cd tests
    export COVERAGE=basic
    source _before-test.sh
    ./_test.sh
