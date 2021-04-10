<?php

namespace App\Controller;

use App\Entity\Post;
use App\Event\RequestLog;
use App\Form\PostType;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use App\Event\EventListener;    

/**
 * @Route("/crud", name="index.")
 */
class CrudController extends AbstractController {
	/**
	 * @Route("/", name="crud")
	 */
	public function index(PostRepository $postRepository): Response{
		$posts = $postRepository->findAll();
		return $this->render('crud/index.html.twig', [
			'posts' => $posts,
		]);
	}
	/**
	 * @Route("/new", name="new")
	 */
	public function form(Request $request, EventDispatcherInterface $dispatcher): Response{
		$post = new Post();
		$form = $this->createForm(PostType::class, $post);

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {

			// dump($post);die;
            // $event = new RequestLog($post);
			// $dispatcher->dispatch($event,RequestLog::NAME);
			$em = $this->getDoctrine()->getManager();
			$em->persist($post);
			$em->flush();
            

			$this->addFlash('info', 'added successfully');
			return $this->redirect($this->generateUrl('index.crud'));
		}

		return $this->render('crud/new.html.twig', [
			'form_post' => $form->createView(),
		]);
	}
	/**
	 * @Route("/view/{id}", name="view")
	 */
	public function view(Request $request, $id): Response{
		$post = $this->getDoctrine()->getRepository(Post::class)->find($id);
		$form = $this->createForm(PostType::class, $post);
		$form->handleRequest($request);

		if ($post == NULL) {

			$this->addFlash('info', 'You got root shell!!');
			return $this->redirect($this->generateUrl('index.crud'));
		}

		if ($form->isSubmitted() && $form->isValid()) {

			$em = $this->getDoctrine()->getManager();
			$em->flush();
			$this->addFlash('info', 'edited successfully');
			return $this->redirect($this->generateUrl('index.crud'));
		} else {
			return $this->render('crud/view.html.twig', [
				'form_post' => $form->createView(),
			]);
		}
	}
	/**
	 * @Route("/delete/{id}", name="delete")
	 */
	public function delete(Post $post): Response{
		$em = $this->getDoctrine()->getManager();

		$em->remove($post);
		$em->flush();

		$this->addFlash('info', 'delete successfully');

		return $this->redirect($this->generateUrl('index.crud'));
	}
}
