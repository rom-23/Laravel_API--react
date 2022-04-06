import React from "react";

class Register extends React.Component {
  constructor() {
    super();
    this.state = {
      email: "",
      password: "",
      confirmPassword: "",
    };
  }

  handleEmailChange = (event) => {
    this.setState({ email: event.target.value }, () => {
      console.log(this.state);
    });
  };

  handlePasswordChange = (event) => {
    this.setState({ password: event.target.value }, () => {
      console.log(this.state);
    });
  };

  handlePasswordConfirm = (event) => {
    this.setState({ confirmPassword: event.target.value }, () => {
      console.log(this.state);
    });
  };

  handleSubmit = (event) => {
    event.preventDefault();
  };

  render() {
    return (
      <>
        <div className="container w-50">
          <h2 className="text-center">Registration</h2>
          <form className="row g-3" method="POST" onSubmit={this.handleSubmit}>
            <div className="col-md-4">
              <label className="form-label">Email</label>
              <input
                type="email"
                className="form-control"
                id="inputEmail4"
                onChange={this.handleEmailChange}
              />
            </div>
            <div className="col-md-4">
              <label className="form-label">Password</label>
              <input
                type="password"
                className="form-control"
                id="inputPassword4"
                onChange={this.handlePasswordChange}
              />
            </div>
            <div className="col-md-4">
              <label className="form-label">Password Confirm</label>
              <input
                type="password"
                className="form-control"
                id="inputPassword5"
                onChange={this.handlePasswordConfirm}
              />
            </div>
            <div className="col-12 text-center">
              <button type="submit" className="btn btn-primary">
                Sign in
              </button>
            </div>
          </form>
        </div>
      </>
    );
  }
}
export default Register;
