import React, { Component } from 'react';
import LoginForm from '../forms/LoginForm';
import PropTypes from 'prop-types';
import { connect } from 'react-redux';
import { login } from '../../actions/auth';

class SignInPage extends Component{

  submit = data => this.props.login(data).then(() => this.props.history.push('manager'));

  render(){
    return (

    <div>
    <LoginForm submit={this.submit}/>
    </div>

    );
  }
}

SignInPage.propTypes = {
  history: PropTypes.shape({
    push: PropTypes.func.isRequired
  }).isRequired,
  login: PropTypes.func.isRequired
};

export default connect(null, { login })(SignInPage);
