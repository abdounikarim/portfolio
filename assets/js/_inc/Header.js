import React, {Component} from 'react';
import {Link} from 'react-router-dom';

export default class Header extends Component {
    render() {
        return (
            <header id="header" className="alt">
                <h1><Link to="/">Abdouni Abdelkarim</Link></h1>
                <nav>
                    <a href="#menu">Menu</a>
                </nav>
            </header>
        );
    }
}
