import React from 'react';
import PropTypes from 'prop-types';

const InLineError = ({text}) => (
  <span style ={{color: "#ae5856"}}> {text} </span>
);

InLineError.propTypes = {
  text: PropTypes.string.isRequired
};

export default InLineError;
