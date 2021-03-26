<template>
    <div>
        <a href="#" @click="login">Login</a>
    </div>
</template>

<script>
    export default {
        methods: {
            login() {
                this.$auth.loginWith('laravelSanctum', {
                    data: {
                        email: 'admin@admin.com',
                        password: 'password'
                    }
                }).then((res) => {
                    if(res.status == 200) {
                        this.$router.push({path: "/test"});
                    }
                } )
            }
        }
    }
</script>

<style scoped>

</style>