<?php

$config = require 'config2.php';

require 'connection.php';
require 'QueryBuilder.php';

return new QueryBuilder(
    Connection::make($config['database'])
);