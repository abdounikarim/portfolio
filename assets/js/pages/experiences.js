import React, {Component} from 'react';
import Header from "../_inc/Header";
import Footer from "../_inc/Footer";
import AllExperiences from "../components/AllExperiences";

export default class Experiences extends Component {
    render() {
        return (
            <div>
                <Header />
                <AllExperiences />
                <Footer />
            </div>
        );
    }
}
