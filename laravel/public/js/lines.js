
//>>>>>>>>>>>>>Lignes en mouvement <<<<<<<<<<<<<<<<<//
// export class BouncingBalls {
//     constructor(canvas) {
//         this.canvas = canvas;
//         this.ctx = canvas.getContext("2d");
//         this.balles = [];


//         canvas.width = window.innerWidth;
//         canvas.height = window.innerHeight;

//         for (let i = 0; i < 250; i++) {
//             const balle = {
//                 x: this.aleatoire_entier(50, canvas.width - 50),
//                 y: this.aleatoire_entier(50, canvas.height - 50),
//                 vx: this.aleatoire(-2, 2),
//                 vy: this.aleatoire(-2, 2),
//                 w: 10,
//                 couleur: this.aleatoire(0, 1) < 0.5 ? "#fff" : "#1DA5F3"
//             };
//             this.balles.push(balle);
//         }


//         this.animate();
//     }

//     animate() {
//         this.clearCanvas();
//         for (const balle of this.balles) {
//             this.updateBalle(balle);
//             this.dessinerBalle(balle);
//         }
//         requestAnimationFrame(() => this.animate());
//     }

//     updateBalle(balle) {
//         balle.x += balle.vx;
//         balle.y += balle.vy;


//         if (balle.x > this.canvas.width || balle.x < 0) {
//             balle.vx = -balle.vx;
//         }


//         if (balle.y > this.canvas.height || balle.y < 0) {
//             balle.vy = -balle.vy;
//         }
//     }

//     dessinerBalle(balle) {

//         this.ctx.fillStyle = balle.couleur;


//         const randomValue = Math.random();


//         if (randomValue < 0.1) {

//             this.ctx.fillStyle = "#fff";


//             this.ctx.shadowColor = "rgba(255, 255, 255, 0.5)";
//             this.ctx.shadowBlur = 20;
//         } else {

//             this.ctx.shadowColor = "transparent";
//             this.ctx.shadowBlur = 0;
//         }

//         this.ctx.beginPath();
//         this.ctx.arc(balle.x, balle.y, balle.w / 2, 0, Math.PI * 2);
//         this.ctx.fill();

//         for (const autre_balle of this.balles) {
//             const dist = this.distance(balle.x, balle.y, autre_balle.x, autre_balle.y);

//             if (dist < 200) {
//                 this.ctx.strokeStyle = "#09111e";
//                 this.ctx.beginPath();
//                 this.ctx.moveTo(balle.x, balle.y);
//                 this.ctx.lineTo(autre_balle.x, autre_balle.y);
//                 this.ctx.stroke();
//             }
//         }
//     }


//     aleatoire(min, max) {
//         const difference = max - min;
//         const aleatoire = Math.random() * difference;
//         return min + aleatoire;
//     }

//     aleatoire_entier(min, max) {
//         return Math.floor(this.aleatoire(min, max + 1));
//     }

//     clearCanvas() {

//         const gradient = this.ctx.createLinearGradient(0, 0, 0, this.canvas.height);
//         gradient.addColorStop(0, "rgba(0, 0, 0, 1)");
//         gradient.addColorStop(0.5, "rgba(42, 100, 112, 0.2)");
//         gradient.addColorStop(1, "rgba(0, 0, 0, 1)");

//         this.ctx.fillStyle = gradient;
//         this.ctx.fillRect(0, 0, this.canvas.width, this.canvas.height);
//     }

//     distance(x1, y1, x2, y2) {
//         return Math.sqrt((x2 - x1) ** 2 + (y2 - y1) ** 2);
//     }
// }

export class BouncingBalls {
    constructor(canvas) {
        this.canvas = canvas;
        this.ctx = canvas.getContext("2d");
        this.balles = [];
        this.numBalls = 200; // Réduit le nombre de balles à 200

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        for (let i = 0; i < this.numBalls; i++) {
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

        this.animate();
    }

    animate() {
        this.clearCanvas();
        for (const balle of this.balles) {
            this.updateBalle(balle);
            this.dessinerBalle(balle);
        }
        requestAnimationFrame(() => this.animate());
    }

    updateBalle(balle) {
        balle.x += balle.vx;
        balle.y += balle.vy;

        if (balle.x > this.canvas.width || balle.x < 0) {
            balle.vx = -balle.vx;
        }

        if (balle.y > this.canvas.height || balle.y < 0) {
            balle.vy = -balle.vy;
        }
    }

    dessinerBalle(balle) {
        this.ctx.fillStyle = balle.couleur;

        const randomValue = Math.random();

        if (randomValue < 0.1) {
            this.ctx.fillStyle = "#fff";
            this.ctx.shadowColor = "rgba(255, 255, 255, 0.5)";
            this.ctx.shadowBlur = 20;
        } else {
            this.ctx.shadowColor = "transparent";
            this.ctx.shadowBlur = 0;
        }

        this.ctx.beginPath();
        this.ctx.arc(balle.x, balle.y, balle.w / 2, 0, Math.PI * 2);
        this.ctx.fill();

        // Évite de dessiner les lignes entre toutes les balles
        for (const autre_balle of this.balles) {
            if (autre_balle !== balle) {
                const dist = this.distance(balle.x, balle.y, autre_balle.x, autre_balle.y);

                if (dist < 180) {
                    this.ctx.strokeStyle = "#09111e";
                    this.ctx.beginPath();
                    this.ctx.moveTo(balle.x, balle.y);
                    this.ctx.lineTo(autre_balle.x, autre_balle.y);
                    this.ctx.stroke();
                }
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
        const gradient = this.ctx.createLinearGradient(0, 0, 0, this.canvas.height);
        gradient.addColorStop(0, "rgba(0, 0, 0, 1)");
        gradient.addColorStop(0.5, "rgba(42, 100, 112, 0.2)");
        gradient.addColorStop(1, "rgba(0, 0, 0, 1)");

        this.ctx.fillStyle = gradient;
        this.ctx.fillRect(0, 0, this.canvas.width, this.canvas.height);
    }

    distance(x1, y1, x2, y2) {
        return Math.sqrt((x2 - x1) ** 2 + (y2 - y1) ** 2);
    }
}






