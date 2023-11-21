<x-app-layout>
    <div class="mt-20">
        <div class="bg-gray-700 w-100 h-10 text-white">
            <h1 class="text-center font-bold p-2">Détails de la consignation</h1>
        </div>
        <hr class="h-1 mt-2 mb-3">

        <div>
            <label for="id_fournisseur">Fournisseur :</label>
            <p>{{ $consignation->fournisseur->nom_fournisseur }}</p>
        </div>

        <div>
            <label for="id_type">Type d'Emballage :</label>
            <p>{{ $consignation->typeEmballage->libelle }}</p>
        </div>

        <div>
            <label for="quantite_Consigne">Quantité Consignée :</label>
            <p>{{ $consignation->quantite_Consigne }}</p>
        </div>
    </div>
</x-app-layout>
