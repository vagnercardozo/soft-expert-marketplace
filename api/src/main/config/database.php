<?php

namespace Src\Main\Config;

use Illuminate\Database\Capsule\Manager as Database;

$connection = new Database;
$connection->addConnection([
  "driver" => "pgsql",
  "host" => "localhost",
  "port" => "5432",
  "database" => "postgres",
  "username" => "postgres",
  "password" => "1234",
  "schema" => "public"
]);
$connection->setAsGlobal();
$connection->bootEloquent();
