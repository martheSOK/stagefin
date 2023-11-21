<x-app-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        
        <div class="flex justify-end">
        <button class="bg-green-700 p-2 rounded-lg text-white font-bold hover:bg-green-900"  id="b0" type="submit"><a href="{{ route('bilan.export-pdf') }}" target="_blank">Télécharger le PDF</a>
        </div>
        <div class="header">
            <!--div class="title">Rapport de Bilan pour le Dépôt : { { $listbilans[}}</div-->
        </div>
    
        <table class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <thead>
                <tr>
                    <th scope="col" class="px-6 py-3">Dépôt</th>
                    <th scope="col" class="px-6 py-3">Stock Initial</th>
                    <th scope="col" class="px-6 py-3">Stock Actuel</th>
                    <th scope="col" class="px-6 py-3">Stock Entré</th>
                    <th scope="col" class="px-6 py-3">Stock Sorti</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($listbilans as $bilan)
                <tr>
                    <td scope="col" class="px-6 py-3">{{ $bilan["depot"]}}</td>
                    <td scope="col" class="px-6 py-3">{{ $bilan['stockInitial'] }}</td>
                    <td scope="col" class="px-6 py-3">{{ $bilan['stockActuelDepot'] }}</td>
                    <td scope="col" class="px-6 py-3">{{ $bilan['stockEntre']}}</td>
                    <td scope="col" class="px-6 py-3">{{ $bilan['stockSortie']}}</td>
                   
                </tr>
                @empty
                    Aucun mouvement effectuer
                @endforelse
                
            </tbody>
        </table>
    </div>
</x-app-layout>
