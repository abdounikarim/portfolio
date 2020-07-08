import React, { Component } from 'react';
import {Route, Switch, BrowserRouter as Router} from "react-router-dom";
import Home from "../pages/home";
import Experiences from "../pages/experiences";
import Legals from "../pages/legals";

export default class Routing extends Component {
    render() {
        return (
            <Router>
                <Switch>
                    <Route exact path="/" component={Home}/>
                    <Route exact path="/experiences" component={Experiences}/>
                    <Route exact path="/mentions-legales" component={Legals}/>
                </Switch>
            </Router>
        );
    }
}
