<?php 
session_start();
require_once("../Login/db_connect.php");

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parabéns!!!</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" type="imagex/png" href="./img/incognita.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');
        body {
            display: flex;
            overflow: hidden;
            font-family: Inter, 'sans-serif';
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #ffffff;
            position: relative;
        }
        
        .container {
            text-align: center;
            padding: 20px;
        }
        
        h1 {
            font-size: 3em;
            animation: fadeIn 4s forwards;
            opacity: 0;
        }

        h2 {
            font-size: 2em;
            animation: fadeIn 4s forwards;
            opacity: 0;
        }

        .container span {
            color: rgb(153, 0, 255);
            animation: none;
            font-size: larger;
        }
        
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }


    </style>
    <style>
        @media (max-width: 600px) {
            h1 {
                font-size: 2em;
            }
            h2 {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Parabéns por ter <span>concluído</span> este enigma!</h1>
        <h2><span style="font-size: 35px;"><?php echo $name ?></span>, você é demais!</h2>
    </div>
    <canvas id="fireworksCanvas" style="position: absolute; top: 0; left: 0; pointer-events: none; z-index: -1;"></canvas>
    <script>const canvas = document.getElementById('fireworksCanvas');
        const ctx = canvas.getContext('2d');
        
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        
        function random(min, max) {
            return Math.random() * (max - min) + min;
        }
        
        function Firework() {
            this.x = random(0, canvas.width);
            this.y = canvas.height;
            this.speed = random(2, 4);
            this.radius = random(2, 4);
            this.color = `hsl(${random(0, 360)}, 50%, 50%)`;
            this.angle = random(0, Math.PI * 2);
            this.targetRadius = 8;
            this.distanceToTarget = random(100, 200);
            this.exploded = false;
        }
        
        Firework.prototype.update = function() {
            this.y -= this.speed;
        
            if (this.y <= this.distanceToTarget) {
                this.exploded = true;
                this.explode();
            }
        };
        
        Firework.prototype.explode = function() {
            for (let i = 0; i < 30; i++) {
                const particle = new Particle(this.x, this.y, this.color);
                particles.push(particle);
            }
        };
        
        function Particle(x, y, color) {
            this.x = x;
            this.y = y;
            this.speed = random(1, 3);
            this.radius = 2;
            this.color = color;
            this.angle = random(0, Math.PI * 2);
        }
        
        Particle.prototype.update = function() {
            this.x += Math.cos(this.angle) * this.speed;
            this.y += Math.sin(this.angle) * this.speed;
            this.speed *= 0.99;
        };
        
        const fireworks = [];
        const particles = [];
        
        function animate() {
            requestAnimationFrame(animate);
            ctx.fillStyle = 'rgba(0, 0, 0, 0.1)';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
        
            fireworks.forEach((firework, index) => {
                firework.update();
                if (firework.exploded) {
                    fireworks.splice(index, 1);
                }
            });
        
            particles.forEach((particle, index) => {
                particle.update();
                if (particle.speed < 0.5) {
                    particles.splice(index, 1);
                }
            });
        
            if (Math.random() < 0.05) {
                fireworks.push(new Firework());
            }
        
            fireworks.forEach(firework => {
                ctx.beginPath();
                ctx.arc(firework.x, firework.y, firework.radius, 0, Math.PI * 2);
                ctx.fillStyle = firework.color;
                ctx.fill();
            });
        
            particles.forEach(particle => {
                ctx.beginPath();
                ctx.arc(particle.x, particle.y, particle.radius, 0, Math.PI * 2);
                ctx.fillStyle = particle.color;
                ctx.fill();
            });
        }
        
        animate();
        </script>
</body>
</html>