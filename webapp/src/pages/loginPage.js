class loginPage extends Component {
    constructor(props) {
        super(props);
        this.state = {
            email: "",
            error: props.error,
            info: props.info,
            password: "",
        };
    }

    setEmail(e) {
        this.setState({ email: e.target.value });
    }

    setPass(e) {
        this.setState({ password: e.target.value });
    }

    checkInput(e) {
        //loggin in and passing it state, will need to trim or extend the method to show more/less state variables
        PostData("test", this.state).then((results) => {
            let responseJSON = results;
            console.log(responseJSON);
        });
    }

    render() {

        return (
            <AuthPage subtitle="Navigating to Home Page">
                <StackedInputs>

                    <InputField
                        type="email"
                        name="uname"
                        id="username"
                        value={this.state.email}
                        placeholder="email@gmail.com"
                        onInput={this.setEmail.bind(this)}
                        required
                        autoFocus
                    />

                    <InputGroup>
                        <InputField
                            type="password"
                            name="password"
                            placeholder="Password"
                            onInput={this.setPass.bind(this)}
                            required
                        />

                        <SubmitButton onClick={this.checkInput.bind(this)}>
                        </SubmitButton>

                    </InputGroup>
                </StackedInputs>

                <HelpmMessage>Corstra Navigation Page</HelpmMessage>
            </AuthPage>
        );
    };
}
export default loginPage;