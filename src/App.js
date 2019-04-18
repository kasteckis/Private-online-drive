import React, { Component } from 'react';
import { Route } from 'react-router-dom';
import SignInPage from './components/pages/SignInPage';
import Manager from './components/pages/Manager';
import './css/style.css';

class App extends Component {

  render() {
    return (
        <div className="App">
          <Route exact path="/" component={SignInPage}></Route>
          <Route path="/manager" component={Manager}></Route>

        </div>
    );
  }
}

export default App;
