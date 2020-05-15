import React, {Component} from 'react';
import {Link} from 'react-router-dom';

export default class Header extends Component {
    render() {
        return (
            <nav id="menu">
                <div className="inner">
                    <h2>Menu</h2>
                    <ul className="links">
                        <li><Link to="/">Accueil</Link></li>
                        <li><Link to="/experiences">Expériences</Link></li>
                        <li><Link to="/projets">Portfolio</Link></li>
                        <li><Link to="/mentions-legales">Mentions légales</Link></li>
                    </ul>
                    <a href="#" className="close">Fermer</a>
                </div>
            </nav>
        );
    }
}
