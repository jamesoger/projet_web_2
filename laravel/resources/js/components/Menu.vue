<template>
    <nav class="hidden" v-show="isMenuVisible">
        <div class="flex-hidden">
            <h1>menu</h1>
            <div class="nav-hidden-btn-menu">
                <div class="nav-btn">
                    <img class="img-hidden" src="{{ asset('icones/menu-black.png') }}" alt="">
                </div>
                <p>menu</p>
            </div>

        </div>

        <a class="nav-hidden-a" href="{{ route('accueil') }}">Accueil</a>
        <a class="nav-hidden-a" href="{{ route('programmation.index') }}">Programmation</a>
        <a class="nav-hidden-a" href="{{ route('billetterie.index') }}">Billetterie</a>
        <a class="nav-hidden-a" href="{{ route('actualites.index') }}">Actualités</a>
        <a class="nav-hidden-a" href="{{ route('info.index') }}">À propos</a>


        <div class="bas-nav">
            <div class="contact-info">
                <p class="mail-nav">Email</p>
                <p>festx@electro.ca</p>
            </div>
            <a class="nav-hidden-compte" href="{{ route('user_connexion.create') }}">Mon compte</a>

            <div class="contact-info">
                <p class="bas-nav">Téléphone</p>
                <p>418-222-1899</p>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
  data() {
    return {

      isMenuVisible: false,
    };
  },
  methods: {
    toggleMenu() {

      this.isMenuVisible = !this.isMenuVisible;
    },

  },
};
</script>


<style lang="scss" scoped>
@import '/css/_variables.scss';


.hidden {

    position: absolute;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    background-color: white;
    width: 100%;
    height: 100%;
    z-index: 100;
    color: black;

    .flex-hidden {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;

    }

    h1 {
        font-family: $font-gothic;
        font-weight: 700;
        font-size: 6em;
        color: black;
        text-align: center;
        text-shadow: 0px 0px 5px black;
        margin: 2rem auto;
    }

    .middle-links {
        margin-top: 20px;
    }

    .nav-hidden-btn-menu {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
        margin-right: 2rem;

        .nav-btn {
            .img-hidden {
                filter: drop-shadow(0px 0px 5px rgba(255, 255, 255, 0.8));
                width: 70px;
                height: 70px;
            }
        }

        p {
            font-size: 1.3em;
            font-family: $font-gothic;
        }
    }

    .nav-hidden-a {
        display: flex;
        align-items: center;
        text-align: center;
        justify-content: center;
        text-decoration: none;
        color: black;
        font-family: $font-ethno;
        font-size: 3em;
        margin-top: 3.5rem;
        margin-right: 2rem;
    }

    .bas-nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        margin-top: 7rem;

        .nav-hidden-compte {
            color: black;
            font-family: $font-ethno;
            font-size: 2.5em;
            font-weight: 500;
            text-decoration: none;
            text-align: center;
            text-transform: uppercase;
            padding: 30px 20px;
            width: 500px;
            margin: 0 10px;
            border: 3px solid black;
            text-shadow: 0px 0px 5px white;
            box-shadow: 0px 0px 5px white, inset 0px 0px 5px white;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;

            &:hover {
                background-color: $blue;
                color: $blue-fonce;
                text-shadow: 0px 0px 5px $blue-fonce;
                box-shadow: 0px 0px 10px $blue;
                border: 3px solid $blue;
            }
        }

        .contact-info {
            font-family: $font-gothic;
            display: flex;
            flex-direction: column;
            align-items: center;

            p {
                font-size: 1.45em;
            }

            .mail-nav {
                font-size: 1.75em;
                font-weight: 600;
            }

            .bas-nav {
                font-size: 1.75em;
                font-weight: 600;
            }
        }
    }
}
</style>
