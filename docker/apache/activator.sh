#!/bin/bash
#
# Enable all config files in /etc/apache2/sites-available directory.
#
# Usage: Make this script executable and run as a user with sudo privileges.
# ==============================================================================

BASE_DIR="/etc/apache2/sites-available"
BASE_DIR_CONF="/etc/apache2/conf-available"

for FILEPATH in $BASE_DIR/*; do
  if [[ -f "$FILEPATH" ]]; then
    CONF=$(basename "$FILEPATH")
    a2ensite ${CONF}
    if [ $? != 0 ]
    then
      echo "a2ensite NOT successful for ${CONF}"
    else
      echo "a2ensite successful for ${CONF}"
    fi
  fi
done

for FILEPATH in BASE_DIR_CONF/*; do
  if [[ -f "$FILEPATH" ]]; then
    CONF=$(basename "$FILEPATH")
    a2enconf ${CONF}
    if [ $? != 0 ]
    then
      echo "a2enconf NOT successful for ${CONF}"
    else
      echo "a2enconf successful for ${CONF}"
    fi
  fi
done