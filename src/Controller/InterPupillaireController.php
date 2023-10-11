<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\PupilleType;
use App\Repository\UserRepository;
use App\Service\EspaceInterpupillaireService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InterPupillaireController extends AbstractController
{
    #[Route('/position-des-pupilles', name: 'app_inter_pupillaire')]
    public function index(Request $request, UserRepository $userRepository, EspaceInterpupillaireService $espaceInterpupillaireService): Response
    {   
        $form = $this->createForm(PupilleType::class);

        $user = $this->getUser();
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isSubmitted()){

            $gx = $form->get('Gx')->getData();
            $gy = $form->get('Gy')->getData();
            $gz = $form->get('Gz')->getData();
            $dx = $form->get('Dx')->getData();
            $dy = $form->get('Dy')->getData();
            $dz = $form->get('Dz')->getData();

            $DIP = sqrt(pow($gx - $dx, 2) + pow($gy - $dy, 2) + pow($gz - $dz, 2));
            $DIP_mm = round($DIP, 2);

            $DIP_mm = $espaceInterpupillaireService->infoUser($form);
            
            
            $user->setEspaceInterpupillaire($DIP_mm);

            $userRepository->save($user, true);
            
            return $this->redirectToRoute('app_result', [
               'id' => $user->getId()
            ]);
        }
        return $this->render('inter_pupillaire/index.html.twig', [
            'form'=> $form->createView()
        ]);
    }

    #[Route('/position-des-pupilles/{id}/résultat', name: 'app_result')]
    public function show(User $user): Response
    {   
        return $this->render('inter_pupillaire/show.html.twig', [
            'user' => $user,
        ]);
    }
}
