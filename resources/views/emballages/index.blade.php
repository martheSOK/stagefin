<x-app-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex justify-end">
            <button class="bg-green-700 p-2 rounded-lg text-white font-bold hover:bg-green-900"  id="b0" type="submit"><a href="{{ route('emballages.create') }}">Ajouter un emballage</a></button>
        </div>
        <hr class="h-1 mt-2 mb-3">
        <h2 class="text-center" >La liste des emballages</h2>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Type_emballage
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Suprimer
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Edition
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Affichage
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($listemballage as $e) 
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        {{$e->libelle}}
                    </td>
                    <td class="px-6 py-4">
                    <form action="{{route('emballages.destroy',$e->id_type)}}"  method="post">
                        @csrf
                        @method("DELETE")
                        <button  id="bx" type="submit"><a><img src="{{asset('images/pb.png')}}" alt="" style="width:50px;"></a></button>
                    </form> 
                    </td>
                    <td class="px-6 py-4">
                        <button id="b2"><a href="{{route('emballages.edit' ,$e->id_type)}}"><img src="{{asset('images/bic.png')}}" alt="" style="width:50px;"></a></button>
                    </td>
                    <td class="px-6 py-4">
                        <button id="b3"><a href="{{route('emballages.show' ,$e->id_type)}}">Show</a></button>
                    </td>
                </tr>
                @empty
                    Aucun depot existant
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>

