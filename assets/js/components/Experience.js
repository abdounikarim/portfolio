import React, {Component} from 'react';
import {Link} from 'react-router-dom';

export default class Experience extends Component {
    constructor(props) {
        super(props);
    }
    render() {
        const { experience, front, index } = this.props;

        return (
            <section className={ index % 2 === 0 ? "wrapper spotlight alt style2" : "wrapper spotlight style1"}>
                <div className="inner">
                    <a href="#" className="image">
                        <img src={experience.image.name} alt={experience.image.alt} />
                    </a>
                    <div className="content">
                        <h2 className="major">{experience.title}</h2>
                        <p>{experience.description}</p>
                        {/*<a href="#" class="special">Voir plus</a>*/}
                        <br />

                        { front === false &&
                            <div className="skills">
                                <p><b><i>Compétences</i></b></p>
                                <p className={index % 2 === 0 ? "img-icons-2" : "img-icons-1"}>
                                    {/*
                                    {% for skill in experience.skills %}
                                        <span>
                                            <img className="img-icon" src="{{ asset(skill.image.name) }}" alt="{{ skill.image.alt }}">
                                            <span>{{skill.image.alt}}</span>
                                        </span>
                                    {% endfor %}
                                    */}
                                </p>
                            </div>
                        }
                    </div>
                </div>
                { index === 2 && front === true &&
                    <div className="inner left">
                        <ul className="actions center">
                            <li><Link to="/experiences" className="button">Toutes les expériences</Link></li>
                        </ul>
                    </div>
                }
            </section>
        );
    }
}
