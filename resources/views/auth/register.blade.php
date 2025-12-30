<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Access Forbidden</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Courier New', monospace;
}

body {
    height: 100vh;
    background: radial-gradient(circle at center, #0a1d3a, #020b1c);
    overflow: hidden;
    color: #7fd1ff;
}

/* MATRIX CANVAS */
canvas {
    position: fixed;
    inset: 0;
    z-index: 0;
}

/* CONTENT */
.overlay {
    position: relative;
    z-index: 2;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.panel {
    text-align: center;
    padding: 40px 48px;
    border-radius: 16px;
    background: rgba(10, 30, 60, 0.55);
    backdrop-filter: blur(6px);
    box-shadow: 0 0 40px rgba(0, 170, 255, .35);
    border: 1px solid rgba(0, 150, 255, .3);
    animation: fadeIn .8s ease;
}

.panel h1 {
    font-size: 2.4rem;
    letter-spacing: 2px;
    color: #9be2ff;
    text-shadow: 0 0 12px rgba(0, 170, 255, .8);
}

.panel p {
    margin-top: 14px;
    font-size: .95rem;
    color: #b6e7ff;
    opacity: .85;
}

.status {
    margin-top: 20px;
    display: inline-block;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: .8rem;
    letter-spacing: 1px;
    color: #00c8ff;
    border: 1px solid rgba(0, 200, 255, .5);
    box-shadow: 0 0 12px rgba(0, 200, 255, .4);
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(.96);
    }
    to {
        opacity: 1;
        transform: none;
    }
}
</style>
</head>
<body>

<canvas id="matrix"></canvas>

<div class="overlay">
    <div class="panel">
        <h1>ACCESS FORBIDDEN</h1>
        <p>Halaman ini tidak diaktifkan oleh administrator sistem.</p>
        <div class="status">STATUS: LOCKED</div>
    </div>
</div>

<script>
const canvas = document.getElementById('matrix');
const ctx = canvas.getContext('2d');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

const letters = '01ABCDEFGHIJKLMNOPQRSTUVWXYZ#$%&@';
const fontSize = 16;
const columns = canvas.width / fontSize;
const drops = Array.from({ length: columns }).fill(1);

function drawMatrix() {
    ctx.fillStyle = 'rgba(2, 10, 28, 0.08)';
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    ctx.fillStyle = '#3fbfff';
    ctx.font = fontSize + 'px monospace';

    for (let i = 0; i < drops.length; i++) {
        const text = letters.charAt(Math.floor(Math.random() * letters.length));
        ctx.fillText(text, i * fontSize, drops[i] * fontSize);

        if (drops[i] * fontSize > canvas.height && Math.random() > 0.975) {
            drops[i] = 0;
        }

        drops[i]++;
    }
}

setInterval(drawMatrix, 40);

window.addEventListener('resize', () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
});
</script>

</body>
</html>
