<?php

class IndexController
{
    public function get()
    {
      header("Location: " . __DIR__ . "/index.html");
      header("Connection: close");
    }
}
