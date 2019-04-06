import React, { Component } from 'react';
//import Validator from 'validator';
import InLineError from '../messages/InLineError';
import PropTypes from 'prop-types';

//import axios from 'axios';

//Reikia pakeisti login path priklauso nuo kur deployini programa
//const LOGIN_PATH = 'http://localhost:8080/react-app/';
//const LOGIN_PATH = 'http://devbridge.tk/backend/LoginHandler.php';
//const LOGIN_PATH = 'https://veinier-roof.000webhostapp.com/backend/LoginHandler.php';


class LoginForm extends Component {

  state = {
    data: {
      marker: 'signup',
      username: '',
      password: ''
    },
    loading: false,
    errors: {}
  };

  handleChange = e => this.setState({
    data: { ...this.state.data, [e.target.name]: e.target.value}
  });

  handleSubmit = (e) => {
    e.preventDefault();
    const errors = this.validate(this.state.data);
    this.setState({errors});
    if(Object.keys(errors).length === 0) {
      this.props.submit(this.state.data)
      //.catch(err => this.setState({ errors: err.response.data.errors }));
    }
  };

  validate = (data) => {
    const errors = {};
    if(!data.username) errors.username = "Can`t be blank";
    if(!data.password) errors.password = "Can`t be blank";
    return errors;
  }

//{ errors.global && (<p>Something went wrong {errors.global}</p>)}
  render(){
    const {data, errors} = this.state;
  return(
    <form id="loginForm"
        onSubmit={this.handleSubmit}>
      <div className="login-box">
        <h1>Login</h1>
          <div className="textbox">
            <i className="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username"
            value={data.username} onChange={this.handleChange}/>
            {errors.username && <InLineError text={errors.username} />}
          </div>
          <div className="textbox">
            <i className="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password"
            value={data.password} onChange={this.handleChange}/>
            {errors.password && <InLineError text={errors.password} />}
          </div>
          <button className="btn" value="Sign in">Sign in</button>
        </div>
      </form>
  );
  }
}

LoginForm.propTypes = {
  submit: PropTypes.func.isRequired
};


export default LoginForm;
