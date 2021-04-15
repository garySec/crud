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
class RelatitionShipController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */    
    public function index(ArticleRepository $article): Response
    {	
        $posts = $article->findAll();
        return $this->render('relatition_ship/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/new", name="new")
     */
    public function new(Request $request)
    {
        $post = new Article();
        $form = $this->createForm(ArticleType::class,$post);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
        // dd($post);

            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            
            $this->addFlash('info', 'added successfully');
            return $this->redirect($this->generateUrl('relatition.index'));
        }
        return $this->render('relatition_ship/new.html.twig', [
                'form' => $form->createView(),
            ]);
        
    }

    /**
     * @Route("/view/{id}", name="view")
     */
    public function view(Request $request, $id): Response
    {
        $post = $this->getDoctrine()->getRepository(Article::class)->find($id);
        $form = $this->createForm(ArticleType::class, $post);
        $form->handleRequest($request);

        if ($post == NULL) {

            $this->addFlash('info', 'You got root shell!!');
            return $this->redirect($this->generateUrl('relatition.crud'));
        }

        if ($form->isSubmitted() && $form->isValid()) 
        {

            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('info', 'edited successfully');
            return $this->redirect($this->generateUrl('relatition.index'));
        } 
        else {
            return $this->render('relatition_ship/view.html.twig', [
                'form' => $form->createView(),
            ]);
        }
    }
    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(Article $post): Response{
        $em = $this->getDoctrine()->getManager();

        $em->remove($post);
        $em->flush();
        $this->addFlash('info', 'Deleted successfully');
        return $this->redirect($this->generateUrl('relatition.index'));
    }
    
     /**
     * @Route("/comment/index", name="comment.index")
     */    
    public function commentIndex(CommentRepository $article): Response
    {   
        $posts = $article->findAll();
        return $this->render('relatition_ship/comment.html.twig', [
            'posts' => $posts,
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

        return $this->render('relatition_ship/new.html.twig', [
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
            return $this->render('relatition_ship/view.html.twig', [
                'form' => $form->createView(),
            ]);
        }
}
    /**
     * @Route("/tag", name="tag.index")
     */    
    public function tag(TagRepository $tags): Response
    {   
        $tags = $tags->findAll();
        return $this->render('relatition_ship/tag.html.twig', [
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

        return $this->render('relatition_ship/new.html.twig', [
               'form' => $form->createView(),
            ]);
    }
}
