<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    public function indexAction()
    {
//        $em=$this->getDoctrine()->getEntityManager();
//        $entry_repo=$em->getRepository("BlogBundle:Entry");
//        $entries=$entry_repo->findAll();
//        
//        foreach ($entries as $entry) {
//            echo $entry->getTitle()."<br>";
//            echo $entry->getCategory()->getName()."<br>";
//            echo $entry->getUser()->getName()."<br>";
//            
//            $tags = $entry->getEntryTag();
//            
//            foreach ($tags as $tag) {
//                echo $tag->getTag()->getName();
//            }
//            
//            echo "<hr>";
//        }
//        die();
        return $this->render('BlogBundle:Default:index.html.twig');
    }
    
    public function catAction()
    {
        $em=$this->getDoctrine()->getEntityManager();
        $entry_repo=$em->getRepository("BlogBundle:Entry");
        $categories=$entry_repo->findAll();
        
        foreach ($categories as $category) {
            echo $category->getTitle()."<br>";
            echo $category->getCategory()->getName()."<br>";
            echo $category->getUser()->getName()."<br>";
            
            $entry = $category->getEntryTag();
            
            foreach ($category as $entry) {
                echo $entry->getEntry()->getName();
            }
            
            echo "<hr>";
        }
        die();
        return $this->render('BlogBundle:Default:index.html.twig');
    }
    
    
    public function cat2Action()
    {
//        $em=$this->getDoctrine()->getEntityManager();
//        $entry_repo=$em->getRepository("BlogBundle:User");
//        $users=$entry_repo->findAll();
//        
//        foreach ($users as $user) {
//            echo $user->getName()."<br>";
//            
//            $entry = $user->getUser();
//            
//            foreach ($user as $entry) {
//                echo $entry->getEntry()->getName();
//            }
//            
//            echo "<hr>";
//        }
//        die();
//        return $this->render('BlogBundle:Default:index.html.twig');
        
        // -----------------------------
        
        $em=$this->getDoctrine()->getEntityManager();
        $user_repo=$em->getRepository("BlogBundle:User");
        $users=$user_repo->findAll();
        
        foreach ($users as $user) {
            echo $user->getName()."<br>";
            
            $entries = $user->getEntry();
            
            foreach ($entries as $entry) {
                echo $entry->getTitle()."<br>";
            }
            
            echo "<hr>";
        }
        die();
        return $this->render('BlogBundle:Default:index.html.twig');
          
    }
    
    public function langAction(Request $request){

            return $this->redirectToRoute("blog_homepage");
    }
    
}
