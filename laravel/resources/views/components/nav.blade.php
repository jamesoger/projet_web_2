<nav class="nav-menu">
    <a href="{{ route('accueil') }}">
        <img id="menuImage" src="{{ asset('logos/plat_gold_blanc.png') }}" alt="FestX">
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
                <img src="{{ asset('icones/menu_9_points.png') }}" alt="menu">
            </div>
            <p class="acc-menu">menu</p>
        </div>
    </div>

    <div class="menu-cache">
        <x-menu />
    </div>

</nav>

<script>
    const menuNav = document.querySelector('.nav-btn')
    const appNav = document.querySelector('#app_menu');
    let menu = document.querySelector('.menu-cache')

    menuNav.addEventListener('click', function() {
        if (menu.style.display === 'none' || menu.style.display === "") {
            menu.style.display = 'block';
        } else {
            menu.style.display = 'none'
        }
    })



    appNav.addEventListener('click', function() {
        if (menu.style.display === 'none' || menu.style.display === '') {
            menu.style.display = 'block';
        } else {
            menu.style.display = 'none';
        }
    });
</script>
