import React, {Component} from 'react';
import Header from "../_inc/Header";
import Footer from "../_inc/Footer";
import Nav from "../_inc/Nav";
import Banner from "../_inc/Banner";
import Wrapper from "../_inc/Wrapper";
import Form from "../_inc/Form";

export default class Home extends Component {
    render() {
        return (
            <div>
                <Header />
                <Nav />
                <Banner />
                <Wrapper />
                <Form />
                <Footer />
            </div>
        );
    }
}
