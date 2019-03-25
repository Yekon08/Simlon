import React, { Component } from 'react';
import logo from './angry-solid.svg';
import './App.css';

import { faHome } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

const font1 = () => (
  <div>
    <FontAwesomeIcon icon={faHome} />
  </div>
);

class App extends Component {
  render() {
    return (
      <div className="App">
        <header className="App-header">
        <FontAwesomeIcon icon={faHome} spin size="5x" />
          <p>
            Hello-world
          </p>
          <a
            className="App-link"
            href="https://reactjs.org"
            target="_blank"
            rel="noopener noreferrer"
          >
            Learn React
          </a>
        </header>
      </div>
    );
  }
}

export default App;
