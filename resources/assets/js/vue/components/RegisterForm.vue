<template>
    <form method="POST" :action="urlRegister">
        <div :class="'form-group row' + (errors.first_name ? ' has-error' : '')">
            <label for="first_name" class="col-md-4 col-form-label text-md-right">First name</label>

            <div class="col-md-6">
                <input id="first_name"
                       type="text"
                       :class="'form-control' + (errors.first_name ? ' is-invalid' : '')"
                       v-model="first_name"
                       required autofocus>
                <form-error v-if="errors.first_name" :errors="errors">
                    {{ errors.first_name }}
                </form-error>
            </div>
        </div>

        <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">Last name</label>

            <div class="col-md-6">
                <input id="last_name"
                       type="text"
                       class="form-control"
                       v-model="last_name"
                       autofocus>
            </div>
        </div>

        <div :class="'form-group row' + (errors.email ? ' has-error' : '')">
            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email"
                       type="email"
                       :class="'form-control' + (errors.email ? ' is-invalid' : '')"
                       v-model="email"
                       required>
                <form-error v-if="errors.email" :errors="errors">
                    {{ errors.email }}
                </form-error>
            </div>
        </div>

        <div :class="'form-group row' + (errors.password ? ' has-error' : '')">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

            <div class="col-md-6">
                <input id="password"
                       type="password"
                       :class="'form-control' + (errors.password ? ' is-invalid' : '')"
                       v-model="password"
                       required>
                <form-error v-if="errors.password" :errors="errors">
                    {{ errors.password }}
                </form-error>
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

            <div class="col-md-6">
                <input id="password-confirm"
                       type="password"
                       class="form-control"
                       v-model="password_confirmation"
                       required>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary" @click="handleSubmit" :disabled="loading">
                    Register
                </button>
            </div>
        </div>
    </form>
</template>

<script>
    import _ from 'lodash'
    import FormError from './FormError';

    export default {
        name: 'RegisterForm',
        props: ['urlRegister', 'verifyEmail'],
        components: {
            FormError,
        },
        data() {
            return {
                first_name: '',
                last_name: '',
                email: '',
                password: '',
                password_confirmation: '',
                errors: {},
                loading: false,
            }
        },
        methods: {
            transformErrors: (errors) => {
                return _.mapValues(errors, function(value) {
                    // Return the very first error
                    return value[0]
                });
            },
            handleSubmit(e) {
                e.preventDefault()
                let that = this
                if (this.password === this.password_confirmation && this.password.length > 0) {
                    this.loading = true
                    window.axios.post(this.urlRegister, {
                        first_name: this.first_name,
                        last_name: this.last_name,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password_confirmation
                    })
                        .then(res => that.loading = false)
                        .catch(error => {
                            that.errors = that.transformErrors(error.response.data.errors)
                            that.loading = false
                        })
                } else {
                    this.password = ''
                    this.password_confirmation = ''

                    that.errors = that.transformErrors({
                        // Default error
                        password: ['Password and password confirmation are not equal']
                    })
                    return false
                }
            }
        }
    }
</script>