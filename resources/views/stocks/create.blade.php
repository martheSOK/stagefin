
<x-app-layout>
    <section class="text-gray-600 body-font">
        <div class="flex justify-end">
            <a class="bg-green-800 p-2 rounded-lg text-white" href=" {{ route('stocks.index') }} ">Listes des quantite d'emballages</a>
        </div>
        <form action="{{route ('stocks.store') }}" method="post">
            @csrf
            <div class="container py-24 mx-auto flex flex-wrap items-center">
            
                <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col m-auto  ">
                    <h2 class="text-gray-900 text-lg font-medium title-font mb-5 text-center">Enregistrer un quantitée d'emballage</h2>
                    <div class="relative mb-4">
                        <label for="id_depot" class="leading-7 text-sm text-gray-600">Depot</label>
                        <select name="id_depot">
                            <option value="">selectionné</option>
                                @foreach ($depots as $depot)
                                <option value="{{ $depot->id_depot }}">{{ $depot->designation }}</option>
                            @endforeach    
                        </select>
                    </div>
                    <div class="relative mb-4">
                        <label for="id_type" class="leading-7 text-sm text-gray-600">TypeEmballage</label>
                        <select name="id_type">
                            <option value="">selectionné</option>
                                @foreach ($typemballages as $typemballage)
                                <option value="{{ $typemballage->id_type }}">{{ $typemballage->libelle }}</option>
                            @endforeach
                                
                        </select>
                    </div>
                    <div class="relative mb-4">
                        <label for="id_fournisseur" class="leading-7 text-sm text-gray-700">Fournisseur</label>
                        <select name="id_fournisseur[]" multiple>
                            <option value="">selectionné</option>
                                @foreach ($fournisseurs as $fournisseur)
                                <option value="{{ $fournisseur->id_fournisseur }}">{{ $fournisseur->nom_fournisseur }}</option>
                            @endforeach
                                
                        </select>
                    </div>
                    <div class="relative mb-4">
                        <label for="quantite_stock" class="leading-7 text-sm text-gray-600">Quantite_stock</label>
                        <input type="text" name="quantite_stock" class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"/><br>
                    </div>
                    <button class="text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg" type="submit">Enregistrer</button>
                </div>
            </div>
        </form>
    </section>
</x-app-layout>