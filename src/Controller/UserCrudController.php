<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserDataRepository;
use App\Form\UserDataType;
use App\Entity\UserData;
use App\Entity\ContactUser;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

     /**
     * @Route("/advance", name="advance.")
     */
class UserCrudController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request,PaginatorInterface $paginator): Response
    {	
    	$data = $this->getDoctrine()->getManager()->getRepository(UserData::class)->findAll();
        // dd($data);
		$posts = $paginator->paginate(
			$data,
			$request->query->getInt('page',1),
			$request->query->getInt('limit',5)
		);

        return $this->render('user_crud/index.html.twig', [
            'posts' => $posts,
        ]);
    }

     /**
     * @Route("/new", name="new")
     */
     public function new(Request $request)
     {

     	$em = $this->getDoctrine()->getManager();

     	$post = new UserData();
     	$form = $this->createForm(UserDataType::class,$post);
     	$form->handleRequest($request);

     	if ($form->isSubmitted() && $form->isValid()) {

     		$em = $this->getDoctrine()->getManager();
     		$em->persist($post);
     		$em->flush();
     	          
     		$this->addFlash('info', 'added successfully');
     		return $this->redirect($this->generateUrl('advance.index'));
        }

     	return $this->render('user_crud/new.html.twig', [
     		'form' => $form->createView(),
     	]);

     }

     /**
     * @Route("/edit/{id}", name="edit")
     */
     public function edit(Request $request,$id)
     {
     	$post = $this->getDoctrine()->getManager()->getRepository(UserData::class)->find($id);

     	$form = $this->createForm(UserDataType::class,$post);
     	$form->handleRequest($request);

     	if ($form->isSubmitted() && $form->isValid()) {

     		$em = $this->getDoctrine()->getManager();
     		$em->persist($post);
     		$em->flush();
     	          
     		$this->addFlash('info', 'edited successfully');
     		return $this->redirect($this->generateUrl('advance.index'));
     	}

     	return $this->render('user_crud/new.html.twig', [
     		'form' => $form->createView(),
     	]);

     }
/**
     * @Route("/delete/{id}", name="delete")
     */
     public function delete($id): Response{

		$post = $this->getDoctrine()->getRepository(UserData::class)->find($id);

		if (!$post) {
			$this->addFlash('info', 'No data exists!');
			return $this->redirect($this->generateUrl('advance.index'));
		}

		$em = $this->getDoctrine()->getManager();
		$em->remove($post);
		$em->flush();
		$this->addFlash('info', 'Deleted successfully');
		return $this->redirect($this->generateUrl('advance.index'));
	}

     /**
     * @Route("/search", name="search")
     */
    public function searchBar()
    {
        $form = $this->createFormBuilder()
                ->setAction($this->generateUrl('advance.result'))
                ->add('search',TextType::class)
                ->add('save',SubmitType::class)
                ->getForm();

        return $this->render('user_crud/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

     /**
     * @Route("/result", name="result")
     */
    public function handleSearch(PaginatorInterface $paginator,Request $request,UserDataRepository $userdata)
    {
        $search = $request->request->get('form')['search'];
        // $data = $userdata->findBy(
        //             array('name'=>$search),
        //             array('contact'=>$search),
        //         );


        $data = $userdata->findAll($search);
        $posts = $paginator->paginate(
            $data,
            $request->query->getInt('page',1),
            // $request->query->getInt('limit',5)
        );

        return $this->render('user_crud/index.html.twig',[
            'posts' => $posts
        ]);

    }
}
