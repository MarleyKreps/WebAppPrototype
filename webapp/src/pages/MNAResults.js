import React, { Component } from 'react'

class MNAResults extends Component {
    constructor() {
        super();
        this.state = {
            date: "date of test",
            score: "0-24",
            scoreInfo: "Score info here",
        };
    }

    render() {
        return (
            <div align="center">
                <h1>Mini-Nutritional Assessment Results from {this.state.date}</h1>
                <h2>{this.state.score}</h2>
                <h2>{this.state.scoreInfo}</h2>
            </div>
        );
    };
}
export default MNAResults