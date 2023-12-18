<x-app-layout>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex justify-end">
            <button class="bg-green-700 p-2 rounded-lg text-white font-bold hover:bg-green-900"  id="b0" type="submit"><a href="{{ route('stocks.create') }}">Ajouter une quantité</a></button>
        </div>
        <hr class="h-1 mt-2 mb-3">
        <h2 class="text-center" >La liste des quantités d'emballage de chaque depot</h2>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                      Depot
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Type_emballage
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Fournisseur
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Quantite_stock
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Editer
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Show
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Supprimer
                    </th>
                </tr>
            </thead>
            <tbody>
              @forelse($listestoks as $stock)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$stock->depots->designation}}
                    </th>
                    <td class="px-6 py-4">
                        {{$stock->type_emballages->libelle}}
                    </td>
                    <td class="px-6 py-4">
                        @foreach($stock->fournisseurs as $fournisseur)
                            {{$fournisseur->nom_fournisseur}}
                        @endforeach
                    </td>
                    <td class="px-6 py-4">
                        {{$stock->quantite_stock}}
                    </td>
                    <td>
                        <button id="b2"><a href="{{route('stocks.edit' ,$stock->id_stock)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg> 
                        </a></button>
                    </td>
                    <td>
                        <button id="b3"><a href="{{route('stocks.show' ,$stock->id_stock)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg> 
                        </a></button>
                    </td>
                    <td>
                        <form action="{{route('stocks.destroy',$stock->id_stock)}}"  method="post">
                            @csrf
                            @method("DELETE")
                            <button  id="bx" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <p class="text-white text-lg mb-4">Aucune liste de stock existante</p>
                @endforelse

            </tbody>
        </table>
    </div>
</x-app-layout>

