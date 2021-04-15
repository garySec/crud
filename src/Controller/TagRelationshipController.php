<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\Tag;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use App\Repository\TagRepository;
use App\Form\ArticleType;
use App\Form\CommentType;
use App\Form\TagType;

     /**
     * @Route("/relatitionship", name="relatition.")
     */

class TagRelationshipController extends AbstractController
{
     /**
     * @Route("/tag", name="tag.index")
     */    
    public function tag(TagRepository $tags): Response
    {   
        $tags = $tags->findAll();
        return $this->render('tag_relationship/tag.html.twig', [
            'tags' => $tags,
        ]);
    }

     /**
     * @Route("/tag/new", name="tag.new")
     */
    public function tagNew(Request $request)
    {
        $post = new Tag();
        $form = $this->createForm(TagType::class,$post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            
            $this->addFlash('info', 'added successfully');
            return $this->redirect($this->generateUrl('relatition.tag.index'));
        }

        return $this->render('tag_relationship/new.html.twig', [
               'form' => $form->createView(),
            ]);
    }
}
