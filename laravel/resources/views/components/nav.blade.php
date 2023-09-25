<nav class="nav-menu">
    <a href="{{ route('accueil') }}">
        <img id="menuImage" src="{{ asset('logos/plat_gold_blanc.png') }}" alt="">
    </a>
    {{-- <a class="nav-a" href="{{ route('actualites.index') }}">Actualités</a>
    <a class="nav-a" href="{{ route('billetterie.index') }}">Billetterie</a>
    <a class="nav-a" href="{{ route('programmation.index') }}">Programmation</a>
    <a class="nav-a" href="{{ route('info.index') }}">À propos</a>
    <a class="nav-a" href="{{ route('user_connexion.create') }}">Mon compte</a>
    <a class="nav-a" href="{{ route('admin_connexion.login') }}">admin</a> --}}
    <div id="app_nav" class="nav-btn-menu">
        <div id="app_menu" class="nav-btn-menu">
            <div class="acc-btn">
                <img src="{{ asset('icones/menu_9_points.png') }}" alt="">
            </div>
            <p class="acc-menu">menu</p>
        </div>
    </div>

    <div class="menu-cache">
        <x-menu />
    </div>

</nav>

<script>
    let appNav = document.querySelector('#app_menu')
    let divCache = document.querySelector('.menu-cache')

   appNav.addEventListener('click', function(){
        if(divCache.style.display === 'none' || divCache.style.display === ""){
            divCache.style.display = 'block';
        } else{
            divCache.style.display = 'none'
        }
   })
</script>
