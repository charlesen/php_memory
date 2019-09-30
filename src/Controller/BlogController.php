<?php
namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NoteController extends AbstractController
{
    public function list()
    {
        $notes = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findAll();

        return $this->render('note/list.html.twig', ['notes' => $notes]);
    }

    public function show($id)
    {
        $note = $this->getDoctrine()
            ->getRepository(Post::class)
            ->find($id);

        if (!$note) {
            // cause the 404 page not found to be displayed
            throw $this->createNotFoundException();
        }

        return $this->render('note/show.html.twig', ['note' => $note]);
    }
}
