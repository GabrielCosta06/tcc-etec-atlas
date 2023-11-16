const canvas = document.getElementById("fireworksCanvas");
const ctx = canvas.getContext("2d");

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

Firework.prototype.update = function () {
  this.y -= this.speed;

  if (this.y <= this.distanceToTarget) {
    this.exploded = true;
    this.explode();
  }
};

Firework.prototype.explode = function () {
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

Particle.prototype.update = function () {
  this.x += Math.cos(this.angle) * this.speed;
  this.y += Math.sin(this.angle) * this.speed;
  this.speed *= 0.99;
};

const fireworks = [];
const particles = [];

function animate() {
  requestAnimationFrame(animate);
  ctx.fillStyle = "rgba(0, 0, 0, 0.1)";
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

  fireworks.forEach((firework) => {
    ctx.beginPath();
    ctx.arc(firework.x, firework.y, firework.radius, 0, Math.PI * 2);
    ctx.fillStyle = firework.color;
    ctx.fill();
  });

  particles.forEach((particle) => {
    ctx.beginPath();
    ctx.arc(particle.x, particle.y, particle.radius, 0, Math.PI * 2);
    ctx.fillStyle = particle.color;
    ctx.fill();
  });
}

animate();
