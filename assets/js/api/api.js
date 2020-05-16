export function fetchJson(url, options) {
    return fetch(url, Object.assign({
        credentials: 'same-origin'
    }, options))
        .then(checkStatus)
        .then(response => {
            return response.text()
                .then((text) => {
                    if (text) {
                        if (JSON.parse(text).hasOwnProperty('hydra:member')) return JSON.parse(text)['hydra:member'];
                        return JSON.parse(text);
                    }

                    return '';
                });
        });
}

function checkStatus(response) {
    if (response.status >= 200 && response.status < 400) {
        return response;
    }

    const error = new Error(response.statusText);
    error.response = response;

    throw error;
}