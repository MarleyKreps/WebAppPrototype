import React, { Component } from 'react';

class test extends Component {
    constructor() {

    }

    sendJson() {
        JSON.stringify(this.state)
    }

    render(){
        return (
            <label >This page should send a JSON containing the info of this label</label>
            <button onClick={this.sendJson}></button>
            );
    };
}
export default test