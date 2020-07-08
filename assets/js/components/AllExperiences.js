import React, {Component} from 'react';
import Experience from "./Experience";
import {getExperiences} from '../api/experience_api';

export default class AllExperiences extends Component {

    constructor(props) {
        super(props);

        this.state = {
            experiences: []
        }
    }

    componentDidMount() {
        getExperiences()
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
                        <Experience
                            key={experience.id}
                            experience={experience}
                            front={false}
                            index={index}
                        />
                    ))
                )}
            </div>
        );
    }
}
