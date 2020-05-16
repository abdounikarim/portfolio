import { fetchJson } from './api';

export function getLastThreeExperiences() {
    return fetchJson('api/experiences.jsonld?itemsPerPage=3&order[id]=DESC');
}

export function getExperiences() {
    return fetchJson('/api/experiences.jsonld?order[id]=DESC');
}
