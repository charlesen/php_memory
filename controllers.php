<?php

// controllers.php
use Symfony\Component\HttpFoundation\Response;

function list_action()
{
    $notes = get_all_notes();
    $html = render_template('templates/list.php', ['notes' => $notes]);

    return new Response($html);
}

function show_action($id)
{
    $note = get_notes_by_id($id);
    $html = render_template('templates/show.php', ['note' => $note]);

    return new Response($html);
}

// helper function to render templates
function render_template($path, array $args)
{
    extract($args);
    ob_start();
    require $path;
    $html = ob_get_clean();

    return $html;
}
