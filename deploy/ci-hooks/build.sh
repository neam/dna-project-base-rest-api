#!/bin/bash

# Script to build the cms during continuous integration (sourced)

# The following env vars needs to be set properly:
# - DRONE_BUILD_DIR

cd $DRONE_BUILD_DIR/cms

    # copy dependencies from versioned-deps
    cp -r $DRONE_BUILD_DIR/versioned-deps/cms/* .

    # do not ignore the versioned deps
    sed -i '/\/vendor\//d' .gitignore
    sed -i '/\/node_modules\//d' .gitignore
    sed -i '/\/bower_components\//d' .gitignore

    # commit
    git add --all

    repo=origin

    set +o errexit
    git status
    diff=$(git diff --cached --exit-code --quiet)$?
    set -o errexit
    case $diff in
        0) echo No changes to files in dist. Skipping commit.;;
        1)
            git commit -m \
                "Added dependencies prior to dokku push"

            ;;
        *)
            echo git diff exited with code $diff. Aborting.
            exit $diff
            ;;
    esac

cd $DRONE_BUILD_DIR
