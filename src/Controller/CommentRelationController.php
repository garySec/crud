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
use Knp\Component\Pager\PaginatorInterface;
     /**
     * @Route("/relatitionship", name="relatition.")
     */

class CommentRelationController extends AbstractController
{
	 /**
     * @Route("/comment/index", name="comment.index")
     */    
    public function commentIndex(Request $request): Response
    {   
        $data = $this->getDoctrine()->getRepository(Comment::class)->findAll();


        return $this->render('comment_relation/comment.html.twig', [
            'comments' => $data,
        ]);
    }
    /**
     * @Route("/newComment", name="comment.new")
     */
    public function commentNew(Request $request)
    {
         $post = new Comment();
        $form = $this->createForm(CommentType::class,$post);
        $form->handleRequest($request);

        
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            
            $this->addFlash('info', 'added successfully');
            return $this->redirect($this->generateUrl('relatition.comment.index'));
        }

        return $this->render('comment_relation/new.html.twig', [
               'form' => $form->createView(),
            ]);
    }
    /**
     * @Route("/comment/edit/{id}", name="comment.edit")
     */    
    public function commentEdit(Request $request,$id): Response
    {   
        
        $post = $this->getDoctrine()->getRepository(Comment::class)->find($id);
        $form = $this->createForm(CommentType::class, $post);
        $form->handleRequest($request);

        if ($post == NULL) {

            $this->addFlash('info', 'You got root shell!!');
            return $this->redirect($this->generateUrl('relatition.comment.index'));
        }

        if ($form->isSubmitted() && $form->isValid()) 
        {

            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('info', 'edited successfully');
            return $this->redirect($this->generateUrl('relatition.comment.index'));
        } 
        else {
            return $this->render('comment_relation/view.html.twig', [
                'form' => $form->createView(),
            ]);
        }
    }
}
