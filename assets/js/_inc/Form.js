import cv from '../../cv.pdf';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import {faEnvelope, faFilePdf, faPhone} from '@fortawesome/free-solid-svg-icons';
import {faGithub, faLinkedin, faSymfony} from "@fortawesome/free-brands-svg-icons";

import React, {Component} from 'react';
import {Link} from "react-router-dom";

export default class Form extends Component {
    render() {
        return (
            <section id="footer">
                <div className="inner">
                    <h2 className="major">Contact</h2>
                    <p>Vous souhaitez que je participe à l'un de vos projets ? Vous êtes intéressés par mon profil ? Vous avez une question ? N'hésitez pas à me contacter, je vous réponds dans les plus brefs délais.</p>
                    {/*
                    {{ form_start(form) }}
                    <div className="fields">
                        <div className="field">
                            {{ form_row(form.name, {
                                label: 'Votre nom'
                            }) }}
                        </div>
                        <div className="field">
                            {{ form_row(form.email, {
                                label: 'Votre email'
                            }) }}
                        </div>
                        <div className="field">
                            {{ form_row(form.message, {
                                label: 'Votre message'
                            }) }}
                        </div>
                    </div>
                    <ul className="actions">
                        <li><input type="submit" value="Envoyer" /></li>
                    </ul>
                    {{ form_end(form) }}
                    */}
                    <ul className="contact">
                        <li>
                            <FontAwesomeIcon icon={faPhone} className="icon" />
                            06-45-65-50-16
                        </li>
                        <li>
                            <a href="mailto:abdounikarim@gmail.com">
                                <FontAwesomeIcon icon={faEnvelope} className="icon" />
                                Mail
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/abdounikarim">
                                <FontAwesomeIcon icon={faGithub} className="icon" />
                                Github
                            </a>
                        </li>
                        <li>
                            <a href="https://connect.symfony.com/profile/abdounikarim">
                                <FontAwesomeIcon icon={faSymfony} className="icon" />
                                Symfony Connect
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/in/abdelkarim-abdouni/">
                                <FontAwesomeIcon icon={faLinkedin} className="icon" />
                                Linkedin
                            </a>
                        </li>
                        <li>
                            <Link to={cv} target="_blank">
                                <FontAwesomeIcon icon={faFilePdf} className="icon" />
                                Télécharger mon CV
                            </Link>
                        </li>
                    </ul>
                </div>
            </section>
        );
    }
}
