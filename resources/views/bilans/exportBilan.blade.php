
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        
        <div class="header">
            <!--div class="title">Rapport du Bilan des mouvements du Dépôt : { { $depot->designation }}</div-->
        </div>
    
        <table border="1">
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
                {{-- {{ dump($bilanData); }} --}}
               
                    @forelse ($bilanData as $bilan)
                    <tr>
                        <td scope="col" class="px-6 py-3">{{ $bilan["depot"]}}</td>
                        <td scope="col" class="px-6 py-3">{{ $bilan['stockInitial'] }}</td>
                        <td scope="col" class="px-6 py-3">{{ $bilan['stockActuelDepot'] }}</td>
                        <td scope="col" class="px-6 py-3">{{ $bilan['stockEntre']}}</td>
                        <td scope="col" class="px-6 py-3">{{ $bilan['stockSortie']}}</td>
                    </tr>
                    @empty
                        Aucun bilan
                    @endforelse
                

            </tbody>
        </table>
    </div>





