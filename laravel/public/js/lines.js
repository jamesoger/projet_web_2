export class BouncingBalls {
    constructor(canvas) {
        this.canvas = canvas;
        this.ctx = canvas.getContext("2d");
        this.balles = [];

        // Initialisation du canvas
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        // Création des balles
        for (let i = 0; i < 250; i++) { // Augmentez ou diminuez le nombre de balles ici
            const balle = {
                x: this.aleatoire_entier(50, canvas.width - 50),
                y: this.aleatoire_entier(50, canvas.height - 50),
                vx: this.aleatoire(-2, 2),
                vy: this.aleatoire(-2, 2),
                w: 10,
                couleur: this.aleatoire(0, 1) < 0.5 ? "#fff" : "#1DA5F3"
            };
            this.balles.push(balle);
        }

        // Définir la boucle d'animation
        this.animate();
    }

    animate() {
        this.clearCanvas();
        for (const balle of this.balles) {
            this.updateBalle(balle);
            this.dessinerBalle(balle);
        }
        requestAnimationFrame(() => this.animate()); // Utilisation de requestAnimationFrame pour l'animation fluide
    }

    updateBalle(balle) {
        balle.x += balle.vx;
        balle.y += balle.vy;

        // Rebond gauche/droite
        if (balle.x > this.canvas.width || balle.x < 0) {
            balle.vx = -balle.vx;
        }

        // Rebond haut/bas
        if (balle.y > this.canvas.height || balle.y < 0) {
            balle.vy = -balle.vy;
        }
    }

    dessinerBalle(balle) {
        // Définir une couleur de base pour la balle
        this.ctx.fillStyle = balle.couleur;

        // Générer un nombre aléatoire entre 0 et 1
        const randomValue = Math.random();

        // Si le nombre aléatoire est inférieur à 0.1 (par exemple), la balle scintille
        if (randomValue < 0.1) {
            // Changez la couleur de la balle en une couleur plus lumineuse (par exemple, jaune)
            this.ctx.fillStyle = "#fff";

            // Augmentez la luminosité de la balle en ajoutant un effet d'ombre ou de lumière
            this.ctx.shadowColor = "rgba(255, 255, 255, 0.5)"; // Couleur de l'ombre
            this.ctx.shadowBlur = 20; // Flou de l'ombre
        } else {
            // Réinitialisez l'ombre pour les balles qui ne scintillent pas
            this.ctx.shadowColor = "transparent";
            this.ctx.shadowBlur = 0;
        }

        this.ctx.beginPath();
        this.ctx.arc(balle.x, balle.y, balle.w / 2, 0, Math.PI * 2);
        this.ctx.fill();

        for (const autre_balle of this.balles) {
            const dist = this.distance(balle.x, balle.y, autre_balle.x, autre_balle.y);

            if (dist < 200) {
                this.ctx.strokeStyle = "#09111e";
                this.ctx.beginPath();
                this.ctx.moveTo(balle.x, balle.y);
                this.ctx.lineTo(autre_balle.x, autre_balle.y);
                this.ctx.stroke();
            }
        }
    }


    aleatoire(min, max) {
        const difference = max - min;
        const aleatoire = Math.random() * difference;
        return min + aleatoire;
    }

    aleatoire_entier(min, max) {
        return Math.floor(this.aleatoire(min, max + 1));
    }

    clearCanvas() {
        // Créer un dégradé linéaire du haut vers le bas (du noir à la couleur avec de la transparence)
        const gradient = this.ctx.createLinearGradient(0, 0, 0, this.canvas.height);
        gradient.addColorStop(0, "rgba(0, 0, 0, 1)"); // Noir complet en haut
        gradient.addColorStop(0.5, "rgba(42, 100, 112, 0.2)"); // Couleur avec de la transparence au milieu
        gradient.addColorStop(1, "rgba(0, 0, 0, 1)"); // Noir complet en bas

        // Remplir le canvas avec le dégradé
        this.ctx.fillStyle = gradient;
        this.ctx.fillRect(0, 0, this.canvas.width, this.canvas.height);
    }

    distance(x1, y1, x2, y2) {
        return Math.sqrt((x2 - x1) ** 2 + (y2 - y1) ** 2);
    }
}





