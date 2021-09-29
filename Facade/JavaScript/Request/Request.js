const Request = function (token) {
    this.token = token;

    this.constructHeaders = function () {
        const headers = new Headers();
        headers.set('Authorization', this.token);
        return headers
    }

    this.handleResponse = function (response) {
        if (response.ok) {
            return response.json();
        } else {
            return Promise.reject({
                status: response.status,
                statusText: response.statusText
            });
        }
    }
}

Request.prototype = {
    /**
     * GET Request
     * @param {string} url
     * @param {object|null} options
     * @returns {Promise<Response>}
     */
    get: function (url, options) {
        return fetch(url, {
            headers: this.constructHeaders(),
            ...options,
        }).then(this.handleResponse);
    },
    /**
     * POST Request
     * @param {string} url
     * @param {object|null} options
     * @returns {Promise<Response>}
     */
    post: function (url, options) {
        return fetch(url, {
            method: 'POST',
            headers: this.constructHeaders(),
            ...options,
        }).then(this.handleResponse);
    },
    /**
     * PUT Request
     * @param {string} url
     * @param {(object|required)} options
     * @returns {Promise<Response>}
     */
    put: function (url, options) {
        return fetch(url, {
            method: 'PUT',
            headers: this.constructHeaders(),
            ...options,
        }).then(this.handleResponse);
    },
    /**
     * PATCH Request
     * @param {string} url
     * @param {(object|required)} options
     * @returns {Promise<Response>}
     */
    patch: function (url, options) {
        return fetch(url, {
            method: 'PATCH',
            headers: this.constructHeaders(),
            ...options,
        }).then(this.handleResponse);
    },
    /**
     * REMOVE Request
     * @param {string} url
     * @param {object|null} options
     * @returns {Promise<Response>}
     */
    delete: function (url, options) {
        return fetch(url, {
            method: 'DELETE',
            headers: this.constructHeaders(),
            ...options,
        }).then(this.handleResponse);
    }
}

export function run() {
    const request = new Request('token');
    request.get('https://jsonplaceholder.typicode.com/users/1').then(res => {
        console.log("Response is:", res)
    }).catch(error => {
        console.log("Error is:", error)
    });
}