import axios from 'axios';

export function getExperiences() {
    return axios.get('/api/experiences');
}

export function getProjects() {
    return axios.get('/api/projects');
}
