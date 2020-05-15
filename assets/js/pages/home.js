import React, {Component} from 'react';
import Header from "../_inc/Header";
import Footer from "../_inc/Footer";
import Nav from "../_inc/Nav";

export default class Home extends Component {
    render() {
        return (
            <div>
                <Header />
                <Nav />
                    <div>Home page</div>
                <Footer />
            </div>
        );
    }
}
