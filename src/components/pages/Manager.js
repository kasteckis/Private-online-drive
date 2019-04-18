import React, { Component } from 'react';
import MenuNav from '../MenuNav';
//import axios from 'axios';

//Reikia pakeisti login path priklauso nuo kur deployini programa
//const LOGIN_PATH = 'http://localhost:8080/react-app/';
//const LOGIN_PATH = 'http://devbridge.tk/backend/LoginHandler.php';
//const LOGIN_PATH = 'https://veinier-roof.000webhostapp.com/backend/LoginHandler.php';

class Manager extends Component {
  render(){
    return (
      <div>
        <MenuNav />
      </div>
    );
  }
}

export default Manager;
