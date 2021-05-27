<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboardssss') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!!! <span><strong>{{ Auth::user()->name }}-- </strong> <em>{{ Auth::user()->id }}--{{ Auth::user()->email }}</em></span>
                    <h3><a href="{{route('headOk')}}">Return Sur Head</a></h3>
                    <h1>Upload To Cloudinary in DB <a href="/">Retour</a></h1> <hr /><br />
                    <form action="{{route('uploadpost')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="monImages[]" multiple />
                        <input type="submit" value="Uploader" />
                    </form>
                    <hr /><br />
                    @isset($img)
                        @foreach($img as $photo)
                            <img src="{{$photo->images}}" alt="">
                            {{$photo->images}}
                        @endforeach
                    @endisset
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<h1>Dashhhhhhhhh</h1>
