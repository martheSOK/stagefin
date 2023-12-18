<x-app-layout>
    <section class="text-gray-600 body-font">
        <div class="flex justify-end">
            <a class="bg-green-800 p-2 rounded-lg text-white" href=" {{ route('personnels.index') }} ">Listes des depots</a>
        </div>
        <form action="{{route ('depots.store') }}" method="post">
            @csrf
            <div class="container py-24 mx-auto flex flex-wrap items-center">
            
                <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col m-auto  ">
                    <h2 class="text-gray-900 text-lg font-medium title-font mb-5 text-center">Enregistrer un depot</h2>
                
                    <div class="relative mb-4">
                    <label for="designation" class="leading-7 text-sm text-gray-600">Nom_du_depot</label>
                    <input type="text" id="designation" name="designation" class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    
                    <button class="text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg" type="submit">Enregistrer</button>
                    
                </div>
            </div>
        </form>
    </section>
</x-app-layout>

