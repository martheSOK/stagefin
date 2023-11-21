<x-app-layout>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex justify-end">
            <button class="bg-green-700 p-2 rounded-lg text-white font-bold hover:bg-green-900"  id="b0" type="submit"><a href="{{ route('depots.create') }}">Ajouter un depot</a></button>
        </div>
        <hr class="h-1 mt-2 mb-3">
        <h2 class="text-center" >La liste des fournisseurs</h2>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nom_fournisseur</th>
                    <th scope="col" class="px-6 py-3">Contact</th>
                    <th scope="col" class="px-6 py-3">Adresse</th>
                    <th scope="col" class="px-6 py-3">suppression</th>
                    <th scope="col" class="px-6 py-3">Edition</th>
                    <th scope="col" class="px-6 py-3">Affichage</th>
                </tr>
        </thead>
        <tbody>
            @forelse($listfournisseur as $fournisseur) 
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="col" class="px-6 py-3">{{$fournisseur->nom_fournisseur}}</td>
                    <td scope="col" class="px-6 py-3">{{$fournisseur->contact}}</td>
                    <td scope="col" class="px-6 py-3">{{$fournisseur->adresse}}</td>
                    <td scope="col" class="px-6 py-3">
                        <form action="{{route('fournisseurs.destroy',$fournisseur->id_fournisseur)}}"  method="post">
                            @csrf
                            @method("DELETE")
                            <button  id="bx" type="submit"><img src="{{asset('images/pb.png')}}" alt="" style="width:50px;"></button>
                        </form> 
                    </td>
                        
                    <td scope="col" class="px-6 py-3">
                        <button id="b2"><a href="{{route('fournisseurs.edit' ,$fournisseur->id_fournisseur)}}"><img src="{{asset('images/bic.png')}}" alt="" style="width:50px;"></a></button>
                    </td>
                    <td scope="col" class="px-6 py-3">
                        <button id="b3"><a href="{{route('fournisseurs.show' ,$fournisseur->id_fournisseur)}}">Show</a></button>
                    </td>
                </tr>
            @empty
                Aucun fournisseur existant
            @endforelse
        </tbody>
    </table>
    </form>
</x-app-layout>
