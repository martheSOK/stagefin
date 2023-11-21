<?php
// namespace App\Http\Controllers; -->
//use PDF;

// use App\Models\Depot;
// use App\Models\TypeEmballage;
// use Barryvdh\DomPDF\Facade as PDF;
// class BilanController extends Controller
// {
//     public function generateBilan( )
//     {
//         $types = TypeEmballage::all();
//         $depotsAvecMouvements = Depot::has('mouvements')->get();

//         $listbilans = [];

//         foreach ($depotsAvecMouvements as $depot) { {
//             $depotDesignation = $depot->designation;
//             $mouvements = $depot->mouvements;
//             $listStocks = [];
//             $typesEmballagesConcernes = [];

//             foreach ($mouvements as $mouvement) {
//                 $typesEmballagesConcernes = array_merge($typesEmballagesConcernes, $mouvement->typesEmballages->all());
//             }

//             $typesEmballagesConcernes = array_unique($typesEmballagesConcernes);
//             return  $typesEmballagesConcernes;
//         }
//     }       // foreach ($types as $type) {
          //     $stock = $depotItem->stocks->where('id_type', $type->id_type)->first();

            //     if ($stock) {
            //         $stockActuelDepot = $stock->quantite_stock;
            //         $stockEntre = $stock->mouvements_destination->pluck('quantite_mouvement')->sum();
            //         $stockSortie = $stock->mouvements_source->pluc
            //         //  public function generateBilan(Depot $depot, String $data_debut,String $date_fin)

                    //$depot=Depot::where('designation','PRINCIPALE')->first();
                    //$stock=$depot->stocks->where('id_type', $type->id_type)->first();
                    //dd($depot);
                    //$stockActueleDepot=$stock->quantite_stock;
                     
                    //return view('bilan.index', compact('bilanData'));
                    //dd($stockActueleDepot);
            
                    //$stockEntre=$stock-> mouvements_destination->pluck('quantite_mouvement')->sum();
                    //$stockSortie=$stock-> mouvements_source->pluck('quantite_mouvement')->sum();
                    //$stockInitiale=$stockActueleDepot-($stockEntre-$stockSortie);
                    //dd($stockInitiale);
                    //dd($stockEntre)k('quantite_mouvement')->sum();
        //             $stockInitial = $stockActuelDepot - ($stockEntre - $stockSortie);

        //             $listStocks[] = [
        //                 'depot' => $depotDesignation,
        //                 'stockActuelDepot' => $stockActuelDepot,
        //                 'stockEntre' => $stockEntre,
        //                 'stockSortie' => $stockSortie,
        //                 'stockInitial' => $stockInitial,
        //             ];
        //         }
        //     }

        //     $listbilans = array_merge($listbilans, $listStocks);
        // }

        // //dd($listbilans);
        // return view('bilan_pdf', compact('listbilans'));
    //}


    /*public function showListMouvements(Depot $depot)
    {
        $mouvementsSource = Mouvement::where('id_depsource', $depot->id)->get();
        $mouvementsDestination = Mouvement::where('id_depdestination', $depot->id)->get();

        return view('', compact('depot', 'mouvementsSource', 'mouvementsDestination'));
    }*/
//     public function generatePDF()
//         {
//         //recupation de données du billan
//             $bilanData =$this->generateBilan($depot);
//             $pdf = PDF::loadView('bilan_pdf', compact('depot', 'bilanData'));
//             return $pdf->stream(); // Pour afficher le PDF dans le navigateur
//             //return $pdf->download('bilan.pdf'); // Pour afficher le PDF pour le téléchargement
//         }

// }