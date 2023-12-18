<x-app-layout>
    <section class="text-gray-600 body-font"> 
        <form >
            <div class="container py-24 mx-auto flex flex-wrap items-center">
                <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col m-auto  ">
                    <h2 class="text-gray-900 text-lg font-medium title-font mb-5 text-center">Affichage d'un type emballage</h2>
                <div class="relative mb-4">
                <label for="libelle" class="leading-7 text-sm text-gray-600">Type_emballage</label>
                <input type="text" id="libelle" name="libelle" class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="@php if (!empty($emballage)){echo $emballage->libelle;} @endphp" disabled>
                </div>
                <button class="text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg" type="submit"><a href="{{route('emballages.index')}}">Quiter</a></button>
            </div>  
        </form>
    </section>
</x-app-layout>