Environment Bootstrap
=====================

# environment-variables

This contains a simplified envbootstrap logic that depends on several environment variables being available through getenv(). The code will set the environment constants according to the values of the environment variables.

# self-detect

This is a symlink to the common/settings directory in the parent repository and contains the full configurations of the virtual machines that are known to be running the codebase. The code will self-detect where it is running and set the environment constants accordingly.