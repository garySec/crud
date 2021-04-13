<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CrudType;
use App\Form\CategoryType;
use App\Entity\Post2;
use App\Entity\Category2;
use App\Repository\Post2Repository;

	/**
	* @Route("/newcrud", name="newCrud.")
	*/

class AcrudController extends AbstractController
{
	/**
	 * @Route("/", name="index")
	 */
	public function index(Post2Repository $postRepository): Response{
		$posts = $postRepository->findAll();
		return $this->render('acrud/index.html.twig', [
			'posts' => $posts,
		]);
	}
    /**
     * @Route("/new", name="new")
     */
    public function new(Request $request): Response
    {
    	$post = new Post2();

    	$form = $this->createForm(CrudType::class,$post);
    	$form->handleRequest($request);

    	if ($form->isSubmitted() && $form->isValid()) {
    		$em = $this->getDoctrine()->getManager();

    		$em->persist($post);
    		$em->flush();
    		$this->addFlash('info', 'Submitted successfully');
    		return $this->redirect($this->generateUrl('newCrud.index'));
    	}

        return $this->render('acrud/new.html.twig', [
            'form' => $form->createView(),
        ]);
    } 
    /**
     * @Route("/category", name="category")
     */
    public function category(Request $request): Response
    {
    	$post = new Category2();

    	$form = $this->createForm(CategoryType::class,$post);
    	$form->handleRequest($request);

    	if ($form->isSubmitted() && $form->isValid()) {
    		$em = $this->getDoctrine()->getManager();

    		$em->persist($post);
    		$em->flush();
    		return $this->redirect($this->generateUrl('newCrud.index'));
    	}

        return $this->render('acrud/category.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
	 * @Route("/edit/{id}", name="edit")
	 */
	public function view(Request $request, $id): Response{
		$post = $this->getDoctrine()->getRepository(Post2::class)->find($id);
		$form = $this->createForm(CrudType::class, $post);
		$form->handleRequest($request);

		if ($post == NULL) {

			$this->addFlash('info', 'You got root shell!!');
			return $this->redirect($this->generateUrl('newCrud.index'));
		}

		if ($form->isSubmitted() && $form->isValid()) {

			$em = $this->getDoctrine()->getManager();
			$em->flush();
			$this->addFlash('info', 'edited successfully');
			return $this->redirect($this->generateUrl('newCrud.index'));
			} 
		else 
		{
			return $this->render('acrud/edit.html.twig', [
				'form' => $form->createView(),
			]);
		}
	}
	/**
	* @Route("/delete/{id}", name="delete")
	*/
	public function delete(Post2 $post): Response{
		$em = $this->getDoctrine()->getManager();

		$em->remove($post);
		$em->flush();
		$this->addFlash('info', 'Deleted successfully');
		return $this->redirect($this->generateUrl('newCrud.index'));
	}
}
