import React, {Component} from 'react';
import {Link} from 'react-router-dom';

export default class Footer extends Component {
    render() {
        return (
            <footer>
                <div className="inner">
                    <ul className="copyright">
                        <li>&copy; 2020 - Abdouni Abdelkarim - Tous droits réservés.</li>
                        <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                        <li><Link to="/mentions-legales">Mentions légales</Link></li>
                    </ul>
                </div>
            </footer>

        );
    }
}
