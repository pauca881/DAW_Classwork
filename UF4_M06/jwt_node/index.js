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
