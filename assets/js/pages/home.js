import React, {Component} from 'react';
import Header from "../_inc/Header";
import Footer from "../_inc/Footer";
import Nav from "../_inc/Nav";
import Banner from "../_inc/Banner";

export default class Home extends Component {
    render() {
        return (
            <div>
                <Header />
                <Nav />
                <Banner />
                    <div>Home page</div>
                <Footer />
            </div>
        );
    }
}
