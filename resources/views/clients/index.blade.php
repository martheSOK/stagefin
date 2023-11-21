<x-app-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex justify-end">
            <button class="bg-green-700 p-2 rounded-lg text-white font-bold hover:bg-green-900"  id="b0" type="submit"><a href="{{ route('clients.create') }}">Ajouter un client</a></button>
        </div>
        <hr class="h-1 mt-2 mb-3">
        <h2 class="text-center" >La liste des clients</h2>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nom_client
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prenomom_client
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Contact
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Adresse
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
                @forelse($listclient as $c) 
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$c->nom}}
                        </th>
                        <td class="px-6 py-4">
                            {{$c->prenom}}
                        </td>
                        <td class="px-6 py-4">
                            {{$c->contact}}
                        </td>
                        <td class="px-6 py-4">
                            {{$c->adresse}}
                        </td>
                        <td>
                        <button id="b2"><a href="{{route('clients.edit' ,$c->id_client)}}"><img src="{{asset('images/msj.jpg')}}" alt="" style="width:50px;"></a></button>
                        </td>
                        <td>
                            <button id="b3"><a href="{{route('clients.show' ,$c->id_client)}}">Show</a></button>
                        </td>
                        <td>
                            <form action="{{route('clients.destroy',$c->id_client)}}"  method="post">
                                @csrf
                                @method("DELETE")
                                <button  id="bx" type="submit"><img src="{{asset('images/pb.png')}}" alt="" style="width:50px;"></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        Aucun personnel existant
                @endforelse

            </tbody>
        </table>
    </div>
</x-app-layout>


