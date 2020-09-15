import axios from 'axios';

export function getLastThreeExperiences() {
    return axios.get('/api/experiences?itemsPerPage=3');
}

export function getExperiences() {
    return axios.get('/api/experiences');
}

export function getLastFourProjects() {
    return axios.get('/api/projects?itemsPerPage=4');
}

export function getProjects() {
    return axios.get('/api/projects');
}
