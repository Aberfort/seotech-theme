// У body должен должен быть атрибут с dataset.ajax
// data-ajax="<?php echo admin_url('admin-ajax.php') ?>"
// Пример использования:
//
// const nonce = searchForm.getAttribute('data-token');
// const data = new FormData();
// data.append('action', 'get-search-result');
// data.append('query', e.target.value);
// data.append('nonce', nonce);
// const sendAjaxRequest = new SendAjaxRequest('text');
//
// sendAjaxRequest.getResponse(data).then(r => {
//     console.log(r);
// })

export default class SendAjaxRequest {
    constructor(typeResponse) {
        this.urlRequest = document.querySelector('body').dataset.ajax;
        this.typeResponse = typeResponse;
    }

    async getResponse(data) {
        try {
            const response = await fetch(this.urlRequest,
                {
                    method: 'POST', // *GET, POST, PUT, DELETE, etc.
                    body: data // body data type must match "Content-Type" header
                }
            );

            let responseData;

            if (this.typeResponse === 'text') {
                responseData = await response.text();
            }

            if (this.typeResponse === 'json') {
                responseData = await response.json();
            }

            return responseData;

        } catch (e) {
            console.error(e)
        }
    }
}
