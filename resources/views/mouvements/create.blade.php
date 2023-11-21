<x-app-layout>
    <form action="{{ route('mouvements.store') }}" method="post">
        @csrf
        <div class="mt-20" >
            <div class="bg-gray-700 w-100 h-10 text-white "> <h1 class="text-center font-bold p-2 ">Enregistrement des mouvements</h1></div>
            <hr class="h-1 mt-2 mb-3">
            <div>
                <label for="id_depsource" class="font-bold">Depot_Source</label>
                <select name="id_depsource">
                    <option value="">selectionné</option>
                    @foreach ($listestoks as $listestok)
                        <option value="{{ $listestok->id_stock }}">{{ $listestok->depots->designation." ".$listestok->type_emballages->libelle }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="id_depdestination" class="font-bold">Depot_Destination</label>
                <select name="id_depdestination">
                    <option value="">selectionné</option>
                    @foreach ($listestoks as $listestok)
                        <option value="{{ $listestok->id_stock }}">{{ $listestok->depots->designation." ".$listestok->type_emballages->libelle }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="quantite_mouvement" class="font-bold" >Quantite</label>
                <input type="text" name="quantite_mouvement"/>
            </div>
            <!-- <div>
                <label for="date" class="font-bold">Date</label>
                <input type="text" name="date" value="{{ $mouvement->created_at }}" readonly>
            </div> -->

            <button type="submit">Enregistrer</button>
        </div>    
    </form>
</x-app-layout>