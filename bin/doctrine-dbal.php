#!/usr/bin/env sh
SRC_DIR="`pwd`"
cd "`dirname "$0"`"
cd "../vendor/doctrine/dbal/bin"
BIN_TARGET="`pwd`/doctrine-dbal.php"
cd "$SRC_DIR"
"$BIN_TARGET" "$@"
