import React from "react";
import Axios from "axios";
import {Navigate, useParams} from "react-router-dom";
import Navbar from "./Navbar";
import AppLoader from "./AppLoader";

class Picture extends React.Component {
    constructor() {
        super();
        this.state = {
            title: "",
            description: "",
            picture: {},
            redirect: false,
            errors: [],
            liked: false
        };
    }

    componentDidMount() {
        if (localStorage.getItem('token')) {
            let id = this.props.params.id;
            let headers = {
                headers: {
                    'API-TOKEN': localStorage.getItem('token')
                }
            }
            Axios.get(`http://127.0.0.1:8000/api/picture/${id}`, headers)
                .then(res => {
                    console.log(res.data);
                    this.setState({picture: res.data}, ()=>{
                        this.checkLike();
                    })
                })
                .catch(error => {
                    console.log(error.response);
                })
        } else {
            this.setState({redirect: true})
        }
    };

    checkLike() {
        let headers = {
            headers: {
                'API-TOKEN' : localStorage.getItem('token')
            }
        }
        Axios.get(`http://127.0.0.1:8000/api/picture/${this.state.picture.id}/checkLike`, headers)
            .then(res => {
                this.setState({liked: res.data})
            })
            .catch(error => {
                console.log(error.response);
            })
    }

    handleLike(){
        let headers = {
            headers: {
                'API-TOKEN' : localStorage.getItem('token')
            }
        }
        Axios.get(`http://127.0.0.1:8000/api/picture/${this.state.picture.id}/handleLike`, headers)
            .then(res => {
                this.checkLike();
            })
            .catch(error => {
                console.log(error.response);
            })
    }

    render() {
        if (this.state.redirect) {
            return (<Navigate to="/"/>);
        }
        return (
            <>
                <Navbar/>
                <div className="container my-5">
                    {
                        this.state.picture && this.state.picture.user
                            ?
                            <div className="row">
                                <div className="col-8">
                                    <img className="img-fluid img-thumbnail"
                                         src={`http://127.0.0.1:8000/storage/pictures/${this.state.picture.image}`} alt=""/>
                                </div>
                                <div className="col-4">
                                    <div className="author">
                                        <h4>{this.state.picture.title}</h4>
                                        <p>{this.state.picture.description}</p>
                                        <h4>Author : <span
                                            className="badge bg-secondary">{this.state.picture.user.email}</span></h4>
                                        {
                                            this.state.liked
                                            ?
                                                <>
                                                    <input className="btn btn-sm btn-danger" type="button" value="Unlike" onClick={()=>this.handleLike()}></input>
                                                </>
                                            :
                                                <>
                                                    <input className="btn btn-sm btn-success" type="button" value="Like" onClick={()=>this.handleLike()}></input>
                                                </>
                                        }
                                    </div>
                                </div>
                            </div>
                            :
                            <div className="d-flex justify-content-center">
                                <AppLoader/>
                            </div>
                    }
                </div>
            </>
        );
    }
}

export default (props) => (
    <Picture
        {...props}
        params={useParams()}/>
)
