import React, {Component} from 'react';

export default class Experience extends Component {

    render() {
        return (
            <section className="wrapper spotlight {{ loop.index is divisible by (2) ? 'alt style2' : 'style1' }}">
                {/*
                <div className="inner">
                    <a href="#" className="image">
                        <img src="{{ asset(experience.image.name) }}" alt="{{ experience.image.alt }}"/>
                    </a>
                    <div className="content">
                        <h2 className="major">{{experience.title}}</h2>
                        <p>{{experience.description}}</p>
                        {#<a href="#" class="special">Voir plus</a>#}
                        <br>
                            {% if front is same as (false) %}
                            <p><b><i>Compétences</i></b></p>
                            <p className="img-icons-{{ loop.index is divisible by (2) ? '2' : '1' }}">
                                {% for skill in experience.skills %}
                                <span>
                            <img className="img-icon" src="{{ asset(skill.image.name) }}" alt="{{ skill.image.alt }}">
                            <span>{{skill.image.alt}}</span>
                        </span>
                                {% endfor %}
                            </p>
                            {% endif %}
                    </div>
                </div>
                {% if loop.index is same as(3) and front %}
                <div className="inner left">
                    <ul className="actions center">
                        <li><a href="{{ path('experiences') }}" className="button">Toutes les expériences</a></li>
                    </ul>
                </div>
                {% endif %}
                */}
            </section>
        );
    }
}
