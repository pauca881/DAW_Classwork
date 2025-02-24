/**
 * Script per a validar, crera token i llegir per a tots els usuaris
 * validats, només els de rol admin poden afegir llibres
 * Mira: https://stackabuse.com/authentication-and-authorization-with-jwts-in-express-js/
 * 
 */

//usuaris  fixos per a fer la prova. 
//L'ideal seria amb BBDD
const users = [
  {
      username: 'john',
      password: 'password123admin',
      role: 'admin'
  }, {
      username: 'anna',
      password: 'password123member',
      role: 'member'
  }
];

//carrega del framework express
const express =require('express');
const cors=require('cors');
const app = express();
//carrega del paquet jsonwebtoken
const jwt = require('jsonwebtoken');
//carrega del body-parser per a recollir el que ens vindrà
//del frontend
const bodyParser = require('body-parser');
app.use(bodyParser.json());

//Esto sirve para que solo esta url pueda acceder
//Si pusiese sólo CORS, cualquier url podría acceder
app.use(cors({
  origin: 'http://localhost:4200', // La URL de tu aplicación Angular
  methods: ['GET', 'POST', 'PUT', 'DELETE']
}));
//paraula secreta necessària en el token
const accessTokenSecret = 'youraccesstokensecret';

//atenem la petició de login
app.post('/login', (req, res) => {
  // Read username and password from request body
  const { username, password } = req.body;

  // Filter user from the users array by username and password
  const user = users.find(u => { return u.username === username && u.password === password });
//si trobem l'usuari a l'array
  if (user) {
      // generem un token
      const accessToken = jwt.sign({ username: user.username,  role: user.role }, accessTokenSecret);
      //enviem el token
      res.json({
          accessToken
      });
  } else {
      res.send('Username or password incorrect');
  }
});

//creem un array de llibres
const books = [
  {
      "author": "Chinua Achebe",
      "country": "Nigeria",
      "language": "English",
      "pages": 209,
      "title": "Things Fall Apart",
      "year": 1958
  },
  {
      "author": "Hans Christian Andersen",
      "country": "Denmark",
      "language": "Danish",
      "pages": 784,
      "title": "Fairy tales",
      "year": 1836
  },
  {
      "author": "Dante Alighieri",
      "country": "Italy",
      "language": "Italian",
      "pages": 928,
      "title": "The Divine Comedy",
      "year": 1315
  },
];

//creem una constant que farà de middleware a qui el faci servir (get i post de books)
const authenticateJWT = (req, res, next) => {
  const authHeader = req.headers["authorization"];
console.log("wuirerioewurioep"+authHeader);
  if (authHeader) {
      const token = authHeader.split(' ')[1];

      jwt.verify(token, accessTokenSecret, (err, user) => {
          if (err) {
              console.log(err)
              return res.sendStatus(403);
          }

          req.user = user;
          next();
      });
  } else {
      res.sendStatus(401);
  }
};

//get de books: si passa el control del middleware hi entrarà 
//i enviarà tots els llibres
app.get('/books',authenticateJWT, (req, res) => {
  console.log('estoy en books')
  res.json(books);
});

//post de books: si passa el control del middleware hi entrarà 
//i comprovarà el rol. Només si som admin ens deixa afegir un llibre

app.post('/books',authenticateJWT, (req, res) => {
  //recollim el rol del user autenticat
  const role =req.user.role;

  if(role !== 'admin'){
      return res.sendStatus(403);
  }
//   const book=req.body
//  books.push(book);
 res.send('Book added successfully');

});

app.listen(3000, () => {
  console.log('Authentication service started on port 3000');
});
