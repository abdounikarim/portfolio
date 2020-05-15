import React, {Component} from 'react';
import Header from "../_inc/Header";
import Footer from "../_inc/Footer";

export default class Home extends Component {
    render() {
        return (
            <div>
                <Header />
                    <div>Home page</div>
                <Footer />
            </div>
        );
    }
}
