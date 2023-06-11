<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResultatController extends AbstractController
{
    /**
     * @Route("/resultat", name="app_resultat")
     */
    public function index(Request $request): Response
    {
        $nombre_a = $request->get("nombre_a");
        $signe = $request->get("signe");
        $nombre_b = $request->get("nombre_b");

        $retour = "";
        if (!is_numeric($nombre_a)) {
            $retour = "impossible";
        }
        if (!is_numeric($nombre_b)) {
            $retour = "impossible";
        }
        if ($retour != "impossible") {
            switch ($signe) {
                case '+':
                    $retour = $nombre_a + $nombre_b;
                    break;
                case '-':
                    $retour = $nombre_a - $nombre_b;
                    break;
                case '*':
                    $retour = $nombre_a * $nombre_b;
                    break;
                case '/':
                    if ($nombre_b == 0 ) {
                        $retour = "impossible";
                    }else{
                        $retour = $nombre_a / $nombre_b;
                    }
                    break;
                default:
                    $retour = "impossible";
                    break;
            }
        }
        $data = array(
            "retour" => $retour,
            "nombre_a" => $nombre_a,
            "nombre_b" => $nombre_b,
            "signe" => $signe,
        );
        return $this->render('resultat/index.html.twig', $data);
    }
}
