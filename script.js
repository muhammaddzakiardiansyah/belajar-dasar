// canvas kotak
// const oneCanvas = document.getElementById("oneCanvas");
// const ctx = oneCanvas.getContext("2d");

//         let x = 50;
//         let y = oneCanvas.height / 4;
//         let dx = 2; 

//         function kotak() {
//             ctx.beginPath();
//             ctx.rect(x, y, 200, 200);
//             ctx.fillStyle = 'black',
//             ctx.lineWidth = 5
//             ctx.fill();
//             ctx.stroke();
//             ctx.closePath();
//         }


// canvas circle

// menyiapkan canvas nya
// const twoCanvas = document.getElementById('twoCanvas');

// // atur ukuran canvas nya

// twoCanvas.width = 500;
// twoCanvas.height = 500;

// // tentukan contex nya

// const c = twoCanvas.getContext('2d');

// // tentukan sudut awalnya

// let x = 50;
// let y = twoCanvas.height / 2;

// // buat fungsi membuat circle

// function circle() {
//     c.beginPath();
//     c.arc(x, y, 20, 0, Math.PI * 2);
//     c.fillStyle = 'black';
//     c.fill();
//     c.closePath()
// }

// circle();

const twoCanvas = document.getElementById('twoCanvas');

twoCanvas.width = 400;
twoCanvas.hight = 300;

const c = twoCanvas.getContext('2d');

let x = 50;
let y = twoCanvas.hight / 2;

function segitiga() {
    c.beginPath();
    c.moveTo(300, 20);
    c.lineTo(500, 120);
    c.lineTo(400, 130);
    c.fillStyle = 'green';
    c.fill();
    c.closePath();
}

segitiga();