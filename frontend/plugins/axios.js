export default function ({ $axios, redirect, app }) {
    $axios.onError(error => {
        if(error.response.status == 423) {
            redirect({ name: 'website-confirm-password', query: { return: app.router.currentRoute.name } });
        }
    });

    $axios.onResponse( response => {
        if( response.data.two_factor == true) {
            redirect({ name: 'website-two-factor-challenge' });
        }
    })
}