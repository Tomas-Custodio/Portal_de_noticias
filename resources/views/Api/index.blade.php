@extends('Layouts.public')

@section('conteudo')

<header>
    <h1 class="text-3xl p-3">Users</h1>
</header>

<section class="p-4 rounded-md flex flex-row items-center justify-center gap-2 flex-wrap">

    @foreach ( $users as $user)
        
            <article class="p-2 bg-green-500 rounded-md w-96 flex flex-col gap-2">
                <p>Nome: {{$user->name}}</p>
                <p>Nome do Usuario :{{$user->username}}</p>
                <p>email :{{$user->email}}</p>

                <p>web :{{$user->website}}</p>


                <section class="flex flex-row items-center justify-end gap-2">
                    <a href="" class="bg-purple-400 text-white p-1 rounded-md">editar</a>

                    <form action="{{ route('api.delete',$user->id) }}" method="Post">

                        @csrf

                        @method("Delete")

                        <button type="submit" class="bg-red-400 text-white p-1 rounded-md">
                                remover
                        </button>

                    </form>
                
             
                </section>

            </article>

        
    @endforeach

</section>

@endsection