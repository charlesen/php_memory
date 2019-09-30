<?php
// index.php

require_once 'model.php';

$notes = get_all_notes();

require 'templates/list.php';
