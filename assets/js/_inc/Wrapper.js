import React, {Component} from 'react';

export default class Wrapper extends Component {
    render() {
        return (
            <div id="wrapper">
                {/*
                {{ include('_inc/_experience_title.html.twig') }}

                {% for experience in experiences %}
                {{ include('_inc/_experience.html.twig', {
                    front: true
                }) }}
                {% endfor %}

                {{ include('_inc/_portfolio.html.twig', {
                    all: false
                }) }}
                */}
            </div>
        );
    }
}
