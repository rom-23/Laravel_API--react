import React from "react";
import { Routes, Route } from "react-router";
import Home from "./Home";
import Login from "./Login";
import Register from "./Register";

class AppRouter extends React.Component {
  render() {
    return (
      <Routes>
        <Route exact path="/" element={<Home/>}/>
        <Route exact path="/register" element={<Register/>}/>
        <Route exact path="/login" element={<Login/>}/>

      </Routes>
    );
  }
}
export default AppRouter;
