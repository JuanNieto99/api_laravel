// Importa el módulo de HTTP y socket.io
const http = require('http');
const socketIO = require('socket.io');
const redis = require('redis');
const redisClient = redis.createClient({ url: "redis://redis:6379" });

// Crea un servidor HTTP utilizando el módulo http
const server = http.createServer((req, res) => {
  res.writeHead(200, { 'Content-Type': 'text/plain' });
  res.end('Servidor de sockets en Node.js\n');
});

// Crea una instancia de socket.io pasando el servidor HTTP
const io = socketIO(server);

// Escucha eventos de conexión de sockets
io.on('connection', async (socket) => {
  console.log('Nuevo usuario conectado');

    try { 

        redisClient.subscribe('channel-notificacion', (res, chanel) => {  
          io.to(socket.id).emit('message', res); 
        });  
        
    } catch (error) {
        console.log("error") 
        console.log(error)
    }

  // Maneja la desconexión del cliente
    socket.on('disconnect', () => {
        console.log('Usuario desconectado');
    });
});

// Escucha en el puerto 3000
const PORT = 3000; 

redisClient.connect().then(() => {
    console.log("Redis connected")
    server.listen(PORT, () => {
        console.log(` 😀 server on port ${PORT}  `);
    });
});