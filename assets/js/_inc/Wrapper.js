import React, {Component} from 'react';
import LastThreeExperiences from "../components/LastThreeExperiences";

export default class Wrapper extends Component {

    render() {
        return (
            <div id="wrapper">
                <LastThreeExperiences />
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
