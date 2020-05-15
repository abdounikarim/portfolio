import logo from '../../images/karim.png';
import React, {Component} from 'react';
import {Link} from 'react-router-dom';

export default class Banner extends Component {
    render() {
        return (
            <section id="banner">
                <div className="inner">
                    {/*
                    {% for message in app.flashes('contact') %}
                        <div className="flash-notice">
                            {{message}}
                        </div>
                        <br>
                    {% endfor %}
                    */}
                    <div className="logo">
                        <img className="icon" src={logo} alt="ABDOUNI Abdelkarim" />
                    </div>
                    <Link to="/">
                        <h2>Abdouni Abdelkarim</h2>
                    </Link>
                    <p>Développeur PHP Symfony</p>
                </div>
            </section>
        );
    }
}
