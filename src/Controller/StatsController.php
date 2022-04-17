<?php

namespace App\Controller;

// use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;

use App\Entity\Command;
use App\Entity\Plat;
use symfony\ux\chartjs\Builder\ChartBuilderInterface;
use symfony\ux\chartjs\Model\Chart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatsController extends AbstractController
{

    /**
     * @Route("/stat", name="app_stat")
     */
    public function index(): Response
    {
        $tabp = $this->getDoctrine()
            ->getRepository(Plat::class)
            ->findAll();

        $tabc = $this->getDoctrine()
            ->getRepository(Command::class)
            ->findAll();

        foreach ($tabp as $o) {
            // $o->get
        }
        

        return $this->render('stat/index.html.twig', [
            'tab' => 's',
        ]);
    }

    /**
     * @Route("/charts", name="app_charts")
     */
    public function chart(ChartBuilderInterface $chartBuilder): Response
    {

        //     $chart = $chartBuilder->createChart(Chart::TYPE_LINE);

        //     $chart->setData([
        //         'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        //         'datasets' => [
        //             [
        //                 'label' => 'My First dataset',
        //                 'backgroundColor' => 'rgb(255, 99, 132)',
        //                 'borderColor' => 'rgb(255, 99, 132)',
        //                 'data' => [0, 10, 5, 2, 20, 30, 45],
        //             ],
        //         ],
        //     ]);

        //     $chart->setOptions([
        //         'scales' => [
        //             'y' => [
        //                 'suggestedMin' => 0,
        //                 'suggestedMax' => 100,
        //             ],
        //         ],
        //     ]);
        //     return $this->render('stats/index.html.twig', [
        //         'chart' => $chart,
        //     ]);
    }
}
