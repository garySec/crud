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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Knp\Component\Pager\PaginatorInterface;
/**
 * @Route("/crud", name="index.")
 */
class CrudController extends AbstractController {
	/**
	 * @Route("/", name="crud")
	 */
	public function index(Request $request,PaginatorInterface $paginator): Response{

		$data = $this->getDoctrine()->getManager()->getRepository(Post::class)->findAll();
		$posts = $paginator->paginate(

			$data,
			$request->query->getInt('page',1),
			// $request->query->getInt('limit',5)
		);

		return $this->render('crud/index.html.twig', [
			'posts' => $posts,
		]);
	}
	/**
	 * @Route("/new", name="new")
	 */
	public function form(Request $request): Response{
		$post = new Post();
		$form = $this->createForm(PostType::class, $post);

			
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
		
			$em = $this->getDoctrine()->getManager();
			$em->persist($post);
			$em->flush();
            
			$this->addFlash('info', 'added successfully');
			return $this->redirect($this->generateUrl('index.crud'));
		}

		return $this->render('crud/new.html.twig', [
			'form' => $form->createView(),
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
				'form' => $form->createView(),
			]);
		}
	}
	/**
	 * @Route("/delete/{id}", name="delete")
	 */
	public function delete($id): Response{

		$post = $this->getDoctrine()->getRepository(Post::class)->find($id);

		if (!$post) {
			$this->addFlash('info', 'No data exists!');
			return $this->redirect($this->generateUrl('index.crud'));
		}

		$em = $this->getDoctrine()->getManager();
		$em->remove($post);
		$em->flush();
		$this->addFlash('info', 'Deleted successfully');
		return $this->redirect($this->generateUrl('index.crud'));
	}
}
