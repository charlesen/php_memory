<?php
// show.php
require_once 'model.php';

$note = get_notes_by_id($_GET['id']);

require 'templates/show.php';
