Gapminder CMS REST API
======================

Versioned API:s used by Gapminder frontends.

API spec can be found in blueprint format under `modules/{api-version}/api-blueprint.md`.

## Adding content

### Add new resource for `item/{nodeId}` endpoint

* Create a new model under `models/RestApi{name}` and extend the appropriate dna model
* Implement behavior `WRestModelBehavior`
* Override method `getAllAttributes` for granular control of what data is to be returned
* Add new model to class map `RestApiModel::$itemModels`

### Add new resource in sir trevor compositions

Notice: These are needed only for those blocks that refer to a Node model and needs data from it.

* Ensure the resource has a model under `models/RestApi{name}`
* Ensure the resource model exists in class map `RestApiModel::$sirTrevorBlockModels`
* Create a new model under `models/blocks/RestApiSirTrevorBlock{name}` and extend `RestApiSirTrevorBlockNode`
* Implement abstract methods from extended class
* Add new model to factory class map `SirTrevorBlockFactory::$blocks`

### Add new resources to item list configs

* Ensure the resource has a model under `models/RestApi{name}`
* Ensure the resource model implements the `RelatedResource` interface
* Add model to class map `RestApiModel::$itemListModels`

### Add new related resources in custom pages and go items

* Ensure the resource has a model under `models/RestApi{name}`
* Ensure the resource model implements the `RelatedResource` interface
* Add model to class map `RestApiModel::$relatedModels`

## Tests

### Test suites

* `api-v1` - Contains acceptance tests that verify various aspects of version 1 of the REST API.

### Test groups

#### data

We test against both the Apiary blueprint and data created explicitly for testing against the database.
The testing-data-scenario is referred to as "test-db", and all tests are grouped into this scenario.

The Apiary blueprint tests are ran against a api-mock server (https://www.npmjs.com/package/api-mock) that reads the
blueprint.md from the app/module/{api-version} folder and serves the defined responses when requested.

The database tests are made to replicate the responses defined in the Apiary blueprint.md file, in order to ensure that
the defined api end points act as indented.

#### coverage

We group all tests based on how much testing coverage is required, so that builds and tests can run faster in cases when full test coverage is not essential:

* `minimal` - The minimal set of tests (default setting for automatic tests in feature branches and on develop)
* `basic` - A little more refined set of tests (default setting for automatic tests in release branches and for production)
* `full` - Includes registering of test users and the life cycle scenario tests (default setting for developers running local tests)
* `paranoid` - Includes long-running tests that were created to protect against various regressions (it is recommended for developers to run these tests locally before finishing a feature branch)

### Running tests locally

Make sure to have api-mock installed. It won't always be pre-installed on the dev environment.

    npm -g install api-mock

#### Using the _test.sh script

First, step into the path of this README.

    cd yiiapps/rest-api/

All tests can be run in sequence.

    cd tests
    source _before-test.sh
    ./_test.sh

It will default to `COVERAGE=full`. To override, set the COVERAGE env var before running the script, for instance:

    cd tests
    export COVERAGE=basic
    source _before-test.sh
    ./_test.sh
