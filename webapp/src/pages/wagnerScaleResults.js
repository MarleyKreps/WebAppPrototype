import React, { Component } from 'react'

class wagnerScaleResults extends Component {
    constructor() {
        super();
        this.state = {
            date: "Date Here",
            score: "0-5",
            scoreInfo: "Test info here",
        };
    }

    render() {
        return (
            <div align="center">
                <h1>Wagner Scale Test Results of day {this.state.date}</h1>
                <h2>{this.state.score}</h2>
                <h2>{this.state.scoreInfo}</h2>
            </div>
        );
    };
}
export default wagnerScaleResults