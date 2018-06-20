import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Site from './Site.js';

export default class Sites extends Component {
    render() {
        return (
            <div className="container">
                <Site></Site>
                <Site></Site>
                <Site></Site>
            </div>
        );
    }
}

if (document.getElementById('sites')) {
    ReactDOM.render(<Sites />, document.getElementById('sites'));
}
