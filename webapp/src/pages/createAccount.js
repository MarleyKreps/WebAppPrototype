import React, { Component } from 'react'
import '../styling/createAccount.css'

class createAccount extends Component {
    constructor() {
        super();
        this.state = {
            fName: "",
            lName: "",
            isClient: false,
            isAdmin: false,
            institutionName: "",
        };
    }

    getValues(e) {
        e.preventDefault();
        console.log(this.state.fName);
        console.log(this.state.lName);
        console.log(this.state.isClient);
        console.log(this.state.isAdmin);
        console.log(this.state.institutionName);
    }

    updateState(e) {
        if (e.target.name === "fname") {
            this.setState({ fName: this.name });

        } else if (e.target.name === "lname"){
            this.setState({ lName: "lName" });

        } else if (e.target.name === "client") {
            this.setState({ fname: true });

        } else if (e.target.name === "admin") {
            this.setState({ fname: false });

        } else if (e.target.name === "institution") {
            this.setState({ fname: "your home" });

        }
    }

    render() {

        return (
            <div>
                <div className="dropdown">
                    <button className="dropbtn">Dropdown</button>
                    {/*this will be left here for now, plan is to add a switch based upon which item they click. This will allow us just to add the user's name and who they work for*/}
                    <div id="myDropdown" className="dropdown-content">
                        <a>Create Clinician Account</a>
                        <a>Create Client Admin Account</a>
                        <a>Create Corstrat Admin Account</a>
                    </div>
                </div>
            
            <form id="accountForm" action="#" method="POST" encType="multipart/form-data">
                <br />
                <div className="row" align="center">
                    First Name : <input type="text" onChange={this.updateState.bind(this)} name="fname" defaultValue="test" /><br />
                    Last Name: <input type="text" name="lname" /><br />
                    is a client(select if true,if not leave blank)?<input type="radio" name="client" /><br />
                    is a admin(select if true,if not leave blank)?<input type="radio" name="admin" /><br />
                    Institution name: <input type="text" name="institution" /><br />
                
                    {/* potentially swap this submit button out for an actual link button with a function to interface to the backend*/}
                    <input id="submit_button" type="button" onSubmit={this.getValues.bind(this)} value="submit" />
                </div>
            </form>
            </div>
        );
    };
}
export default createAccount