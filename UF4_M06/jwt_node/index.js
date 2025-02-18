"use strict";


//Perque s'actualitzi automàticament em fa falta instalar el paquet nodemon
//require("nodemon")(file);

const express = require("express");
const jwt = require("jsonwebtoken");
const bodyParser = require("body-parser");
const clau_del_token = 'A54C';

const app = express();
app.use(express.json())


const users=[
{
  username:"john",
  password:"passjohn",
  role:"admin"
},


{
  username:"anna",
  password:"passanna",
  role:"member"
}
]

//Verifica que vingui amb la petició de token

const authenticateJWT = (req, res, next) => {

  //Busco del header, l'opció authortization
  const authHeader = req.headers.authorization;

  //Si el trobo
  if(authHeader){
    //es separa per espai, agafo la segona part del token
    const token = authHeader.split(" ")[1];

    jwt.verify(token, clau_del_token, (err, decoded) => {
      if(err){
        res.status(401).json({error: "No autenticat"});
      }
      else{
        req.user = decoded;
        next();
      }
    });
  }
  else{
    res.status(401).json({error: "No autenticat"});
  }
}

app.post("/login", (req, res) => {
  
  const {username, password} = req.body;
  
  const user = users.find(u => {return u.username === username && u.password === password});

  if(user){

    //const accessToken = jwt.sign({valors}, clau_del_token);
    const accessToken = jwt.sign({username: user.username, role: user.role}, clau_del_token);
    res.json({accessToken});

  }

  else{
    res.status(401).json({error: "Usuari o contrasenya incorrecte"});
  }


});

app.get("/books", (req, res) => {

  res.json(users);

});

//Funció que no pot entrar tothom
app.get("/books2", authenticateJWT, (req, res) => {

  res.json(users);

});




app.listen(3000, () => {
  console.log("Aquest és un servidor Node Express");
});
