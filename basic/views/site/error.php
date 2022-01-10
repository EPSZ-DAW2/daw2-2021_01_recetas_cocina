<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <div class="alert alert-danger text-center">
        <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    </div>

    <h5 class="text-center">La página requerida no existe pero aquí tienes un juego en su lugar. Usa <span class="label label-danger">ESPACIO</span> para disparar y <span class="label label-danger">←</span>&#160;<span class="label label-danger">→</span> para moverte.<a class="mx-5 btn btn-warning" href="?r=site/error">Resetear</a> </h5>

    <div class=" text-center">
        <canvas class="text-center  mx-auto" id="gameCanvas" height="600" width="600"></canvas>

    </div>


</div>



<script>
    let canvas = document.getElementById("gameCanvas");
    let ctx = canvas.getContext("2d");
    let ship = new Ship();
    let lr = 1;
    let Lives = 3;
    let score = 0;
    let ap = 0;
    let newLife = true;
    let canShootAgain = true;
    let killedByAlien = false;
    let aliensReachEarth = false;
    let alienFireRate = 1500;
    let Invaders = [];
    let InvaderShots = [];
    let Obstacles = [];
    let il = 55;
    let s = 0.2;
    let fireRate = 500;
    for (let i = 0; i < il; i++) {
        let inva = new Invader();
        inva.x = (i * 30) + 20;
        if (i > 10 && i < 22) {
            inva.y = 120;
            inva.x = ((i - 11) * 40) + 20;
            inva.color = "#00ffed";
        } else if (i > 21 && i < 33) {
            inva.y = 160;
            inva.x = ((i - 22) * 40) + 20;
            inva.color = "#00ffed";
        } else if (i > 32 && i < 44) {
            inva.y = 200;
            inva.x = ((i - 33) * 40) + 20;
            inva.color = "#ff00cb";
        } else if (i > 43) {
            inva.y = 240;
            inva.x = ((i - 44) * 40) + 20;
            inva.color = "#ff00cb";
        } else if (i < 11) {
            inva.y = 80;
            inva.x = (i * 40) + 20;
            inva.color = "#faff00";
        }
        Invaders[i] = inva;
    }
    for (let i = 0; i < 4; i++) {
        let obstacle = new Obstacle();
        obstacle.x = (i * 140) + 60;
        Obstacles[i] = obstacle;
    }

    let tick = setInterval(updateArea, 10);
    let invaderFiring = setInterval(invaderFire, alienFireRate); //Invader fire rate set 1500 default

    function random(min, max) {
        return Math.floor(Math.random() * max) + min;
    }

    document.addEventListener("keydown", function (e) {
        if (e.keyCode === 37) {
            ship.velX = -3;
        } else if (e.keyCode === 39) {
            ship.velX = 3;
        }
    });

    document.addEventListener("keydown", function (e) {
        if (e.keyCode === 32) {
            if (canShootAgain) {
                ship.shoot();
                canShootAgain = false;
                setTimeout(function () { canShootAgain = true; }, fireRate); //Fire rate
            }
        }
    });

    document.addEventListener("keyup", function (e) {
        if (e.keyCode === 37) {
            ship.velX = 0;
        } else if (e.keyCode === 39) {
            ship.velX = 0;
        }
    });

    function roundToTen(n) {
        return Math.round(n / 10) * 10;
    }

    function outsideBounds(a, b) {
        if (a.x + a.w < b.x || a.x > b.x + b.w) {
            return true;
        } else {
            return false;
        }
    }

    function invaderFire() {
        let r = random(0, Invaders.length);
        let f = random(0, 4);
        let t = random(0, 3);
        let fos = random(0, 3);
        if (ship.x > canvas.width - 140 || ship.x < 140) {
            console.log("Ship on side (near border).");
            if (fos > 0) {
                let maxX = 0;
                let minX = 2000;
                let maxXO;
                let minXO;
                for (let i = 0; i < Invaders.length; i++) {
                    if (Invaders[i].x > maxX) {
                        maxX = Invaders[i].x;
                        maxXO = Invaders[i];
                    }
                    if (Invaders[i].x < minX) {
                        minX = Invaders[i].x;
                        minXO = Invaders[i];
                    }
                }
                if (ship.x > canvas.width - 140 && t <= 1) {
                    maxXO.shoot();
                    console.log("Right ship firing.");
                } else if (ship.x < 140 && t <= 1) {
                    minXO.shoot();
                    console.log("Left ship firing.");
                }
            }
        }
        if (f >= 1) {
            Invaders[r].shoot();
        }
        if (t === 0) {
            for (let i of Invaders) {
                if (i.x > ship.x - 22 && i.x < ship.x + 32) {
                    i.shoot();
                    console.log("Alien sharpshooter firing.");
                    return;
                }
            }
        }
    }

    function updateArea() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ship.update();
        ship.show();
        for (let i of Obstacles) {
            i.update();
            i.show();
        }
        for (let i = 0; i < Lives; i++) {
            let ns = new Ship();
            ns.x = (i * 50) + 20;
            ns.y = 10;
            ns.hull.y = 20;
            ns.show();
        }
        ctx.fillStyle = "#FFFFFF";
        ctx.textAlign = "center";
        ctx.font = "30px 'VT323', sans";
        ctx.fillText("Score: " + Math.floor(score), canvas.width - 70, 60);
        ctx.fillText("Lives: x" + Lives, 70, 60);
        let maxX = 0;
        let minX = 2000;
        for (let i = 0; i < Invaders.length; i++) {
            if (Invaders[i].x > maxX) {
                maxX = Invaders[i].x;
            } else if (Invaders[i].x < minX) {
                minX = Invaders[i].x;
            }
        }
        for (let i of InvaderShots) {
            ctx.fillStyle = "#FFFFFF";
            ctx.fillRect(i.x, i.y += 5, 4.25, 7);
            ctx.fillStyle = "#510b4b";
            ctx.fillRect(i.x + 2, i.y - 4, 4, 4);
            ctx.fillRect(i.x, i.y - 8, 4, 4);
            ctx.fillRect(i.x + 2, i.y - 12, 4, 4);
            ctx.fillRect(i.x + 2, i.y - 12, 4.25, 6);
        }
        for (let i of Invaders) {
            switch (Invaders.length) {
                case 50:
                    s = 0.3;
                    i.velx = lr * s;
                    break;
                case 45:
                    s = 0.4;
                    i.velX = lr * s;
                    break;
                case 40:
                    s = 0.6;
                    i.velX = lr * s;
                    break;
                case 30:
                    s = 0.8;
                    i.velX = lr * s;
                    alienFireRate = 1250;
                    break;
                case 20:
                    s = 1.2;
                    i.velX = lr * s;
                    alienFireRate = 1000;
                    break;
                case 15:
                    s = 1.35;
                    i.velX = lr * s;
                    break;
                case 10:
                    s = 1.4;
                    i.velX = lr * s;
                    break;
                case 5:
                    s = 1.8;
                    i.velX = lr * s;
                    alienFireRate = 500;
                    break;
                case 1:
                    s = 2.75;
                    i.velX = lr * s;
                    break;
            }
        }
        for (let i = 0; i < Invaders.length; i++) {
            if (Invaders[i].y < canvas.height - 120 && Invaders[i].y > canvas.height - 140) {
                ap--;
            }
            if (Invaders[i].y > canvas.height - 120 && Invaders[i].y < canvas.height - 90) {
                if (ap < 1) {
                    console.log("Aliens are close to Earth.");
                    ap++;
                }
                Invaders[i].color = "#43ff00";
            }
            if (Invaders[i].y > canvas.height - 100) {
                console.log("Aliens reached Earth.");
                aliensReachEarth = true;
            } else if (!Invaders[i].destroyed) {
                if (maxX > canvas.width - 20) {
                    Invaders[i].y += 20;
                    Invaders[i].velX = -1 * s;
                    lr = -1;
                    Invaders[i].update();
                    Invaders[i].show();
                } else if (minX < 1) {
                    Invaders[i].y += 20;
                    Invaders[i].velX = s;
                    lr = 1;
                    Invaders[i].update();
                    Invaders[i].show();
                } else {
                    Invaders[i].update();
                    Invaders[i].show();
                }
            }
        }
        if (killedByAlien && Lives > 0) {
            ctx.fillStyle = "#FFA500";
            ctx.fillRect(ship.x - 15, ship.y, ship.hull.w, 30);
            killedByAlien = false;
            ship.x = random(30, canvas.width - 80);
            Lives--;
        }
        if ((killedByAlien && Lives === 0) || Lives === 0 || aliensReachEarth) {
            clearInterval(tick);
            clearInterval(invaderFiring);
            ctx.fillStyle = "#FF0000";
            ctx.textAlign = "center";
            ctx.font = "50px 'VT323', sans";
            ctx.fillText("Game Over", canvas.width / 2, 60);
            if (aliensReachEarth) {
                ctx.fillStyle = "#43ff00";
                ctx.textAlign = "center";
                ctx.fillText("Aliens Reached Earth", canvas.width / 2, 110);
            }
        }
        if (Invaders.length <= 0) {
            clearInterval(tick);
            clearInterval(invaderFiring);
            ctx.fillStyle = "#43ff00";
            ctx.textAlign = "center";
            ctx.font = "50px 'VT323', sans";
            ctx.fillText("You Win", canvas.width / 2, 60);
        }
        if (score >= 30 && newLife) {
            Lives++;
            newLife = false;
        }
    }

    function Ship() {
        this.x = canvas.width / 2;
        this.y = canvas.height - 40;
        this.velX = 0;
        this.hull = {
            x: this.x - 20,
            y: canvas.height - 30,
            w: 40,
            h: 10
        }
        this.shots = [];
        this.shoot = function () {
            if (canShootAgain) {
                this.shots[this.shots.length] = {
                    x: this.x + 2.5,
                    y: canvas.height - 50,
                    w: 5,
                    h: 10
                }
            }
        }
        this.update = function () {
            if (this.x - 20 > 0 && this.x + 30 < canvas.width) {
                this.x += this.velX;
            } else if (this.x - 20 <= 0 && this.velX > 0) {
                this.x += this.velX;
            } else if (this.x + 30 >= canvas.width && this.velX < 0) {
                this.x += this.velX;
            }
            for (let i of InvaderShots) {
                if (i.x > this.x - 15 && i.x < this.x + 25 && i.y > canvas.height - 40) {
                    killedByAlien = true;
                    InvaderShots.splice(InvaderShots.indexOf(i), 1);
                    console.log("Killed by alien.");
                } else if (i.y >= canvas.height) {
                    InvaderShots.splice(InvaderShots.indexOf(i), 1);
                }
            }
            if (0 < this.shots.length) {
                for (let i = 0; i < this.shots.length; i++) {
                    if (this.shots[i].y > 0) {
                        ctx.fillStyle = "#FFFFFF";
                        ctx.fillRect(this.shots[i].x, this.shots[i].y -= 8, 5, 10);
                        ctx.fillStyle = "#666b75";
                        ctx.fillRect(this.shots[i].x, this.shots[i].y + 13, 1, 5);
                        ctx.fillRect(this.shots[i].x + 4, this.shots[i].y + 14, 2, 3);
                        ctx.fillRect(this.shots[i].x + 2, this.shots[i].y + 15, 1, 3);
                        ctx.fillRect(this.shots[i].x + 1.5, this.shots[i].y + 18, 2, 4);
                    } else {
                        this.shots.splice(i, 1);
                        fireRate = 550;
                        setTimeout(function() {fireRate = 500;}, 1000);
                    }
                    for (let i2 = 0; i2 < Invaders.length; i2++) {
                        if (this.shots[i].x > Invaders[i2].x && this.shots[i].x < Invaders[i2].x + 20 && this.shots[i].y > Invaders[i2].y && this.shots[i].y < Invaders[i2].y + 20) {
                            Invaders[i2].destroyed = true;
                            ctx.fillStyle = "#FFA500";
                            ctx.fillRect(Invaders[i2].x, Invaders[i2].y, 20, 20);
                            Invaders.splice(i2, 1);
                            this.shots.splice(i, 1);
                            score += 0.5;
                            fireRate = 425;
                            setTimeout(function() {fireRate = 500;}, 1000);
                        }
                    }
                    for (let i2 of InvaderShots) {
                        let a = i2.x > this.shots[i].x ? i2.x - this.shots[i].x : this.shots[i].x - i2.x;
                        let b = i2.y > this.shots[i].y ? i2.y - this.shots[i].y : this.shots[i].y - i2.y;
                        if (Math.sqrt(a * a + b * b) < 5) {
                            ctx.fillStyle = "#FFA500";
                            ctx.fillRect(this.shots[i].x, this.shots[i].y, 10, 10);
                            InvaderShots.splice(InvaderShots.indexOf(i2), 1);
                            this.shots.splice(i, 1);
                            console.log("Bullet collision.");
                            score++;
                        }
                    }
                }
            }
        }
        this.show = function () {
            ctx.fillStyle = "#43ff00";
            ctx.fillRect(this.x, this.y, 10, 20);
            ctx.fillRect(this.x - 15, this.hull.y, 40, 10);
        }
    }

    function Invader() {
        this.destroyed = false;
        this.color = "#FFFFFF";
        this.x;
        this.y;
        this.velX = s;
        this.shots = [];
        this.shoot = function () {
            InvaderShots[InvaderShots.length] = {
                x: this.x + 7.5,
                y: this.y + 20,
                w: 5,
                h: 10
            }
        }
        this.update = function () {
            this.x += this.velX;
        }
        this.show = function () {
            ctx.fillStyle = this.color;
            ctx.fillRect(this.x, this.y, 20, 20);
        }
    }

    function Obstacle() {
        this.x;
        this.y = canvas.width - 70;
        this.width = 60;
        this.destroyed = [];
        this.xNums = [];
        this.maxX;
        this.minX;
        this.update = function () {
            for (let i of this.destroyed) {
                this.xNums.push(i.x);
            }
            this.maxX = Math.max(...this.xNums);
            this.minX = Math.min(...this.xNums);
            for (let i of ship.shots) {
                if (this.x + this.width > i.x && this.x < i.x && this.y < i.y && this.y + 10 > i.y) {
                    this.doDamage(i, ship.shots);
                    return;
                }
            }
            for (let i of InvaderShots) {
                if (this.x + this.width > i.x && this.x < i.x && this.y < i.y && this.y + 10 > i.y) {
                    this.doDamage(i, InvaderShots);
                    return;
                }
            }
        }
        this.doDamage = function (shot, arr) {
            shot.x = Math.round(shot.x);
            if (this.destroyed.length <= 0) {
                this.destroyed.push({
                    x: shot.x,
                    w: 15
                });
                arr.splice(arr.indexOf(shot), 1);
                return;
            } else {
                for (let i of this.destroyed) {
                    if (shot.x + shot.w < this.minX || this.maxX < shot.x - 10) {
                        this.destroyed.push({
                            x: shot.x,
                            w: 15
                        });
                        arr.splice(arr.indexOf(shot), 1);
                        return;
                    }
                    return;
                }
            }
        }
        this.show = function () {
            ctx.fillStyle = "#43ff00";
            ctx.fillRect(this.x, this.y, this.width, 10);
            for (let i of this.destroyed) {
                ctx.clearRect(i.x, this.y, i.w, 10);
            }
        }
    }
</script>