<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Never Rain Studios - Administração</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script type="application/javascript" src="{{asset('js/tag_selector.js')}}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>
        function removeCar(id){
            if($("#removerCarousel").val() == "")
                $("#removerCarousel").val($("#removerCarousel").val()+ id);
            else
                $("#removerCarousel").val($("#removerCarousel").val()+ ","+id);
            $("#remCar"+id).attr("disabled", true);
        }

        function removeGame(id){
            if(confirm("Deseja mesmo remover?"))
                window.location.href = "/ademiro/jogos/delete/"+id;
        }

        function removeNoticia(id){
            if(confirm("Deseja mesmo remover?"))
                window.location.href = "/ademiro/noticias/delete/"+id;
        }

        function removePlataforma(id){
            if(confirm("Deseja mesmo remover?"))
                window.location.href = "/ademiro/plataformas/delete/"+id;
        }

        function removeTag(id){
            if(confirm("Deseja mesmo remover?"))
                window.location.href = "/ademiro/tags/delete/"+id;
        }
    </script>
    <style>
        .tag-container{
            border:1px solid black;
            padding: 10px;
            border-radius: 5px;
            display:flex;
            
        }
        .tag-container .tag{
            padding:5px;
            border: 1px solid #ccc;
            margin:5px;
            display:flex;
            align-items: center;
            border-radius: 3px;
            background-color: #f2f2f2;
        }
        .tag i{
            font-size: 16px;
            margin-left: 5px;
        }
        .tag-container select{
            flex: 1;
            font-size: 16px;
            padding: 5px;
            outline: none;
            border:0;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/ademiro') }}">
                    Never Rain Studios - Administração
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/ademiro/jogos">Jogos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/ademiro/plataformas">Plataformas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/ademiro/noticias">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/ademiro/tags">Tags</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
        function createTag(label){
            div = document.createElement("div");
            div.setAttribute("class", 'tag');
            span = document.createElement("span")
            span.innerHTML = label;
            close = document.createElement("i");
            close.setAttribute("class", 'material-icons');
            close.innerHTML = "close";
            close.setAttribute("onclick","removeTag('"+label+"')");

            div.appendChild(span);
            div.appendChild(close);

            return div;
        }
    </script>

    @if(isset($langs) && isset($plataformas))
        <script>

            updateTags();

            function updateTags(){
                $(".platfs .tag").each(function(index){
                    $(this).remove();
                });

                JSON.parse($("#platfs").val()).slice().reverse().forEach(element => {
                    $(".tag-container.platfs").prepend(createTag(element));
                });

                
            }

            function selectEvent(){
                if($("#plataformas").val() == "")
                    return;
                tags = JSON.parse($("#platfs").val());
                if(!tags.includes($("#plataformas").val()))
                    tags.push($("#plataformas").val());
                $("#platfs").val(JSON.stringify(tags));

                updateTags();
            };

            function removeTag(tag){
                tags = JSON.parse($("#platfs").val());
                index = tags.indexOf(tag);
                tags.splice(index, 1);
                $("#platfs").val(JSON.stringify(tags));
                updateTags();
            }
        </script>
    @endif
    @if(isset($langs) && isset($tags))
        <script>

            updateTagsTag();

            function updateTagsTag(){
                $(".tgs .tag").each(function(index){
                    $(this).remove();
                });

                JSON.parse($("#tgs").val()).slice().reverse().forEach(element => {
                    $(".tag-container.tgs").prepend(createTag(element));
                });

                
            }

            function selectEventTag(){
                if($("#tags").val() == "")
                    return;
                tags = JSON.parse($("#tgs").val());
                if(!tags.includes($("#tags").val()))
                    tags.push($("#tags").val());
                $("#tgs").val(JSON.stringify(tags));

                updateTagsTag();
            };

            function removeTag(tag){
                tags = JSON.parse($("#tgs").val());
                index = tags.indexOf(tag);
                tags.splice(index, 1);
                $("#tgs").val(JSON.stringify(tags));
                updateTagsTag();
            }
        </script>
    @endif
</body>
</html>
