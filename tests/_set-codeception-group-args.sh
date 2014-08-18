#!/bin/bash

# This script is necessary in order to be able to run the correct set of tests while keeping it easy to annotate which
# tests belongs to which groups within the tests themselves

# set the codeception test group arguments depending on DATA and COVERAGE
if [ "$DATA" == "" ]; then
    echo "Warning: DATA is not properly set (Current value is: '$DATA')"
    DATA="not-set"
fi
case "$COVERAGE" in
    "minimal")
        CODECEPTION_GROUP_ARGS="-g data:$DATA,coverage:minimal"
        ;;
    "basic")
        CODECEPTION_GROUP_ARGS="-g data:$DATA,coverage:minimal -g data:$DATA,coverage:basic"
        ;;
    "full")
        CODECEPTION_GROUP_ARGS="-g data:$DATA,coverage:minimal -g data:$DATA,coverage:basic -g data:$DATA,coverage:full"
        ;;
    "paranoid")
        CODECEPTION_GROUP_ARGS="-g data:$DATA,coverage:minimal -g data:$DATA,coverage:basic -g data:$DATA,coverage:full -g data:$DATA,coverage:paranoid"
        ;;
    *)
        echo "Warning: COVERAGE is not properly set (Current value is: '$COVERAGE')"
        CODECEPTION_GROUP_ARGS="-g data:$DATA,coverage:not-set"
        ;;
esac
echo "CODECEPTION_GROUP_ARGS=$CODECEPTION_GROUP_ARGS"