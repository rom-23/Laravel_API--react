import React from "react";
import Navbar from "./Navbar";

class Home extends React.Component {
  constructor() {
    super();
    this.state = {};
  }
  render() {
    return (
      <>
        <Navbar />
        <div className="container">
          <div className="d-flex justify-content-center"></div>
        </div>
      </>
    );
  }
}
export default Home;
