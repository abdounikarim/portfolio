import React, {Component} from 'react';
import Experience from "./Experience";
import {getLastThreeExperiences} from '../api/experience_api';

export default class LastThreeExperiences extends Component {

    constructor(props) {
        super(props);

        this.state = {
            experiences: []
        }
    }

    componentDidMount() {
        getLastThreeExperiences()
            .then((data) => {
                this.setState({
                    experiences: data
                });
            });
    }

    render() {
        console.log(this.state.experiences);
        return (
            <div id="wrapper">
                { this.state.experiences.length > 0 && (
                    this.state.experiences.map((experience, index) => (
                        <Experience experience={experience} key={experience.id} front={true} index={index} />
                    ))
                )}

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
