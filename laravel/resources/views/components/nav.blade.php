<nav class="nav-menu">
    <a href="{{ route('accueil') }}" class="logo-nav">
        <img id="menuImage" src="{{ asset('logos/plat_gold_blanc.png') }}" alt="FestX">
    </a>

    <div id="app_menu" class="nav-btn-menu">
        <div class="acc-btn">
            <img src="{{ asset('icones/menu_9_points.png') }}" alt="menu">
        </div>
        <p class="acc-menu">menu</p>
    </div>

    <div class="menu-cache">
        <x-menu />
    </div>

</nav>

<script>
    const menuNav = document.querySelector('.nav-btn')
    const appNav = document.querySelector('#app_menu');
    let menu = document.querySelector('.menu-cache')
    let body = document.querySelector('body')
    menuNav.addEventListener('click', function() {
        if (menu.style.display === 'none' || menu.style.display === "") {
            menu.style.display = 'block';
        } else {
            menu.style.display = 'none'
            body.classList.remove('popup')
        }
    })



    appNav.addEventListener('click', function() {
        if (menu.style.display === 'none' || menu.style.display === '') {
            menu.style.display = 'block';
            body.classList.add('popup')
        } else {
            menu.style.display = 'none';
        }
    });
</script>
