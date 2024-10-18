<?php
function env($key, $default = null)
{
  $envPath = __DIR__ . '/../../.env';
  $env = file_exists($envPath) ? parse_ini_file($envPath) : [];

  if (array_key_exists($key, $env)) {
    return $env[$key];
  }

  return $default;
}
